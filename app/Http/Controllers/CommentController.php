<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'rating' => 'required',
        ]);

        if (!Auth::check()) {
            //mengirim session url 
            $request->session()->put('previousUrl', url()->previous());
            return redirect('/login')->with('warning', 'Please login first!');
        }

        $user = Auth::user();

        // Simpan komentar ke database
        $comment = new Comment();
        $comment->content_comments = $request->input('content');
        $comment->rating_comments = $request->input('rating');
        $comment->id_user = $user->id;
        $comment->id_post = $request->input('id_post');
        $comment->save();

        // Redirect atau berikan respons sukses
        return back()->with('success', 'Komentar berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'content_comments' => 'required',
        ]);

        $comment->update([
            'content_comments' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
