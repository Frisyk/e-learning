<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscribeTransactionRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\SubscribeTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    //
    public function index(){
        $courses = Course::with(['category', 'teacher', 'students'])->orderBydesc('id')->get();

        return view('front.index', compact('courses'));
    }

    public function details(Course $course){
        return view('front.details', compact('course'));
    }
    public function pricing(){
        return view('front.pricing');
    }
    
    public function category(Category $category){
        $courses = $category->courses()->get();
        return view('front.category', compact('courses'));
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
        if(!$user->hasActiveSubscription()){
            return redirect()->route('front.pricing');
        }
        $video = $course->course_videos->firstWhere('id', $courseVideoId);
        $user->courses()->syncWithoutDetaching($course->id);
        return view('front.learning', compact('course', 'video'));
    }
}
