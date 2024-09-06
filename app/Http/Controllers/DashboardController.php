<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CourseStudent;
use Illuminate\Routing\Controller;
use App\Models\SubscribeTransaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $coursesQuery = Course::query();

        if($user->hasRole('teacher')) {
            $coursesQuery->whereHas('teacher', function ($query) use ($user){
                $query->where('user_id', $user->id);
            });
            $students =  CourseStudent::whereIn('course_id', $coursesQuery->select('id'))
            ->distinct('user_id')
            ->count('user_id');
        } else {
            $students =  CourseStudent::distinct('user_id')
            ->count('user_id');
        }

        $joinedCourses = $user->courses() // Access the courses relationship
            ->with(['category', 'teacher']) // Eager load related models if necessary
            ->withCount('students') // Adds students_count for each course
            ->orderBy('students_count', 'desc') // Optional: Sort by number of students
            ->get();

        $courses = $coursesQuery->count();
        $categories = Category::count();
        $transactions = SubscribeTransaction::count();
        $teachers = Teacher::count();

        return view('dashboard', compact( 'categories', 'courses' , 'transactions', 'students', 'teachers', 'joinedCourses'));
        
    }
}