<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if(auth()->guest() || auth()->user()->username !== 'alvin_karnady'){
        //     abort(403);
        // }
        // if(!auth()->check() || auth()->user()->username !== 'alvin_karnady'){
        //     abort(403);
        // }

        //pakai GATE
        // $this->authorize('admin');

        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_categories' => 'required|min:5|max:255|unique:data_categories',
            'slug_categories' => 'required|unique:data_categories',
            'image_categories' => 'image|file|max:5024'
        ]);

        if ($request->file('image_categories')) {
            $validatedData['image_categories'] = $request->file('image_categories')->store('category-images');
        }

        $validatedData['id_users'] = auth()->user()->id;

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'New category has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
            'categories' => Category::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name_categories' => 'required|min:5|max:255',
            'image_categories' => 'image|file|max:5024',
        ];


        if ($request->slug_categories != $category->slug_categories) {
            $rules['slug_categories'] = 'required|unique:data_categories';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image_categories')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image_categories'] = $request->file('image_categories')->store('category-images');
        }

        $validatedData['id_users'] = auth()->user()->id;

        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image_categories) {
            Storage::delete($category->image_categories);
        }

        Category::destroy($category->id);

        return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
    }


    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug_categories', $request->name);
        return response()->json(['slug_categories' => $slug]);
    }
}
