<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::orderByDesc('id')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {        
        DB::transaction(function () use ($request) {

            $validated = $request->validated();
            if($request->hasFile('icon')){
                $iconPath = $request->file('icon')->store('icon', 'public');
                $validated['icon'] = $iconPath;
            } else {
                $iconPath = 'images/avatar-default.png';
            }

            $validated['slug'] = Str::slug($validated['name']);

            $category = Category::create($validated);
        });

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view ('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        DB::transaction(function () use ($request, $category) {

            $validated = $request->validated();
            if($request->hasFile('icon')){
                $iconPath = $request->file('icon')->store('icon', 'public');
                $validated['icon'] = $iconPath;
            } 

            $validated['slug'] = Str::slug($validated['name']);

            $category->update($validated);
        });

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        DB::beginTransaction();
        try {
            $category->delete();
            DB::commit();

            return redirect()->route('admin.categories.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.categories.index')->with('error', 'terjadinya sebuah error');
        }
    }
}