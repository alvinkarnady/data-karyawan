<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('id_user', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title_posts' => 'required|min:5|max:255',
            'slug_posts' => 'required|unique:data_posts',
            'id_category' => 'required',
            'image_posts' => 'image|file|max:5024',
            'body_posts' => 'required'
        ]);

        if ($request->file('image_posts')) {
            $validatedData['image_posts'] = $request->file('image_posts')->store('post-images');
        }

        $validatedData['id_user'] = auth()->user()->id;
        $validatedData['excerpt_posts'] = Str::limit(strip_tags($request->body_posts), 200, '...');

        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        // Dapatkan semua komentar terkait dengan postingan
        $comments = $post->comments()->get();

        if (!empty($comments)) {
            return view('dashboard.posts.show', [
                // "title" => "Single Post",
                // "active" => 'posts',
                "post" => $post,
                "comments" => $comments
            ]);
        } else {
            // Jika tidak ada komentar, berikan respons atau lakukan tindakan lain
            return view('dashboard.posts.show', [
                // "title" => "Single Post",
                // "active" => 'posts',
                "post" => $post,
                "comments" => []
            ]);
        }

        // return view('dashboard.posts.show', [
        //     'post' => $post
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title_posts' => 'required|min:5|max:255',
            'id_category' => 'required',
            'image_posts' => 'image|file|max:5024',
            'body_posts' => 'required'
        ];


        if ($request->slug_posts != $post->slug_posts) {
            $rules['slug_posts'] = 'required|unique:data_posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image_posts')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image_posts'] = $request->file('image_posts')->store('post-images');
        }

        $validatedData['id_user'] = auth()->user()->id;
        $validatedData['excerpt_posts'] = Str::limit(strip_tags($request->body_posts), 200, '...');

        Post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image_posts) {
            Storage::delete($post->image_posts);
        }

        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }


    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug_posts', $request->title);
        return response()->json(['slug_posts' => $slug]);
    }
}
