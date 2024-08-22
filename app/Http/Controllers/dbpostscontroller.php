<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

//lab2 - use model to communicate with DB
use App\Models\Post;

class dbpostscontroller extends Controller
{
    function getposts()
    {
        dd("Err");
        $posts = Post::paginate(3);
        
        return view("posts.getposts", ["posts" => $posts]);
    }

    function createpost()
    {
        $posts = Post::all();
        return view("posts.createpost", ["posts" => $posts]);
    }

    function savepost()
    {
        $image_path = '';
        $data = request()->all();
        if (request()->hasFile("image")) {
            $image = request()->file("image");
            $image_path = $image->store("images", $image_path);
        }
        $post = new Post;
        $post->title = $_POST['title'];
        $post->body = $_POST['body'];
        $post->postedby = $_POST['postedby'];
        $post->image = $image_path;
        $post->save(); // save post

        return to_route('getposts');
    }

    function showpost($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return view('notfound');
        }
        return view("posts.showpost", ["post" => $post]);
    }

    function editpost($id)
    {
        $post = Post::findOrFail($id);
        if (!$post) {
            return view('notfound');
        }
        return view("posts.editpost", ["post" => $post]);
    }

    function updatepost($id)
    {
        $post = Post::findOrFail($id);
        $image_path = '';
        $data = request()->all();
        if (request()->hasFile("image")) {
            $image = request()->file("image");
            $image_path = $image->store("images", $image_path);
        }

        $post->title = $_POST['title'];
        $post->body = $_POST['body'];
        $post->postedby = $_POST['postedby'];
        if ($image_path) {
            $post->image = $image_path;
        }
        $post->image = $image_path;
        $post->save(); // save post

        return to_route('posts.getposts');
    }

    function deletepost($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return view('notfound');
        }
        $post->delete(); // remove post

        return to_route('getposts');
    }
}