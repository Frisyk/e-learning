<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscribeTransactionRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseVideo;
use App\Models\SubscribeTransaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    //
    public function index(){
// Fetch courses with the number of students, related models, and sort by student count
        $courses = Course::withCount('students') // Add a students_count attribute
            ->with(['category', 'teacher', 'students']) // Eager load related models
            ->orderBy('students_count', 'desc') // Sort by number of students in descending order
            ->get();

        $categories = Category::all();
    
        return view('front.index', compact('courses', 'categories'));
    }

    public function details(Course $course){
        return view('front.details', compact('course'));
    }

    public function pricing(){
        $user = Auth::user();
        return view('front.pricing', compact('user'));
    }
    public function categories(){
        $courses = Course::with(['category', 'teacher', 'students'])->orderByDesc('id')->get();
        $categories = Category::all();
        return view('front.categories', compact('courses', 'categories'));
    }
    public function classes(){
        $courses = Course::with(['category', 'teacher', 'students'])->orderByDesc('id')->get();
        $categories = Category::all();
        return view('front.classes', compact('courses', 'categories'));
    }
    
    public function category(Category $category){
        $courses = $category->courses()->get();
        return view('front.category', compact('courses', 'category'));
    }

    public function roadmap(Course $course){
        $user = Auth::user();
        // $roadmap = $->courses()->get(); 
        $roadmap = [
            'Pengantar Biologi dan Metode Ilmiah',
            'Struktur dan Fungsi Sel',
            'Genetika dan Pewarisan Sifat',
            'Evolusi dan Keanekaragaman Hayati',
            'Kingdom Animalia',
            'Anatomi dan Fisiologi Manusia',
            'Ekologi dan Ilmu Lingkungan',
            'Biologi Tumbuhan',
            'Mikroorganisme dan Penyakit',
        ];
        return view('front.roadmap', compact('roadmap', 'user'));
    }
    

    public function checkout(){
        return view('front.checkout');
    }

    public function checkout_store(StoreSubscribeTransactionRequest $request)
    {
        $user = Auth::user();
    
        // Check if the user already has an active subscription
        if ($user->hasActiveSubscription()) {
            return redirect()->route('front.index');
        }
 
    
        DB::transaction(function () use ($request, $user) {
            // Validate the request data
            $validated = $request->validated();
    
            // Handle the proof file upload
            if ($request->hasFile('proof')) {
                $proofPath = $request->file('proof')->store('proofs', 'public');
                $validated['proof'] = $proofPath;
            } 
    
            // Set additional fields
            $validated['user_id'] = $user->id;
            $validated['total_amount'] = 429000; // Set the total amount
            $validated['is_paid'] = false; // Set the payment status as unpaid
    
            // Create the transaction in the database
            SubscribeTransaction::create($validated);
        });
    
        // Redirect to the front index page after successful transaction
        return redirect()->route('dashboard');
    }


    public function learning(Course $course, $courseVideoId){
        $user = Auth::user();

        // Check if the user has an active subscription
        if(!$user->hasActiveSubscription()){
            return redirect()->route('front.pricing');
        }
    
        // Retrieve the CourseVideo by its ID
        $video = $course->course_videos->firstWhere('id', $courseVideoId);
    
        // Sync the course with the user's courses
        $user->courses()->syncWithoutDetaching($course->id);
    
        // Debug to see the video details    
        // Return the view with the course and video
        return view('front.learning', compact('course', 'video'));
    }
    
}
