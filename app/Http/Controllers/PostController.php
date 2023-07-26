<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function getIndex()
    {
        $posts = Post::with('Author')->orderBy('id', 'DESC')->paginate(2);
        return view('index', ['posts' => $posts]);
    }

    public function getAdmin()
    {
        return view('addpost');
    }

    /**
     * Method to save blog post in database
     * @param \Illuminate\Http\Request $request
     */
    public function postAdd(Request $request)
    {
        $data = ['title' => $request->title, 'content' => $request->content, 'author_id' => Auth::user()->id];
        // $data = $request->all();
        $validation = Validator::make($data, Post::$rules);
        // $validation = $request->validate(Post::$rules, $data);
        // dd($validation);
        if ($validation->fails()) {
            return redirect()->back()->with('error', 'Your post could not be added! Please try again');
        } else {
            $post = Post::create($data);
            $post->save();
            return redirect()->back()->with('success', 'Your post has been added successfully');
        }
    }
}
