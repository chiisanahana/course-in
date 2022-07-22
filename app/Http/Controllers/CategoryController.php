<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lesson;
use App\Models\Wishlist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateInput = $request->validate([
            'name' => 'required|unique:categories',
            'image' => 'required|mimes:jpg,jpeg,svg,png,webp,avif'
        ]);

        $category = new Category();
        $category->name = Str::title($request->name);
        $category->image = $request->file('image')->store('categories', 'public');
 
        $category->save();
        return redirect()->route('categories.index')
            ->with('successMsg', $request->name . ' category added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category', [
            'category' => $category->name,
            'lessons' => Lesson::where('category_id', $category->id)->orderBy('lesson_name')->with('course')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function viewUpdate()
    {
        return view('admin.view_category', [
            'categories' => Category::all()
        ]);
    }
    
    public function edit(Category $category)
    {
        return view('admin.update_category', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validation = [];
        if(!$request->name || ($request->name && $request->name != $category->name)){
            $validation['name'] = 'required|unique:categories';
        }
        if ($request->image) {
            $validation['image'] = 'mimes:jpg,jpeg,svg,png,webp,avif';
        }

        $validated = $request->validate($validation);

        if ($request->image) {
            Storage::disk('public')->delete(Category::whereId($category->id)->first()->image);
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        Category::whereId($category->id)->update($validated);
        return redirect()->route('view-update')
            ->with('successMsg', $request->name . ' category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
