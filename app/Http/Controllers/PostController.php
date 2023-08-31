<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use PharIo\Manifest\Author;

class PostController extends Controller
{

    public function index()
    {

        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug_categories', request('category'));
            $title = ' in ' . $category->name_categories;
        }

        if (request('author')) {
            $author = User::firstWhere('username_users', request('author'));
            $title = ' by ' . $author->name_users;
        }

        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }


    public function show(Post $post)
    {
        // Dapatkan semua komentar terkait dengan postingan
        $comments = $post->comments()->get();


        if (!empty($comments)) {
            return view('post', [
                "title" => "Single Post",
                "active" => 'posts',
                "post" => $post,
                "comments" => $comments
            ]);
        } else {
            // Jika tidak ada komentar, berikan respons atau lakukan tindakan lain
            return view('post', [
                "title" => "Single Post",
                "active" => 'posts',
                "post" => $post,
                "comments" => []
            ]);
        }
    }


    // public function show(Post $post){
    //     return view('post',[
    //         "title" => "Single Post",
    //         "active" => 'posts',
    //         "post" => $post
    //     ]);
    // }
}
