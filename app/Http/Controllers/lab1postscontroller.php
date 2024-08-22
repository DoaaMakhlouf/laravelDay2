<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class postscontroller extends Controller
{
    private $posts = [
        [
            "id" => 1,
            "title" => "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
            "body" => "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto",
            "postedby" => "Ahmed",
            "created at" => "2018-04-10"
        ],
        [
            "id" => 2,
            "title" => "qui est esse",
            "body" => "est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla",
            "postedby" => "Mona",
            "created at" => "2018-05-10"
        ],
        [
            "id" => 3,
            "title" => "ea molestias quasi exercitationem repellat qui ipsa sit aut",
            "body" => "et iusto sed quo iure\nvoluptatem occaecati omnis eligendi aut ad\nvoluptatem doloribus vel accusantium quis pariatur\nmolestiae porro eius odio et labore et velit aut",
            "postedby" => "Doaa",
            "created at" => "2018-07-10"
        ]
    ];
    function getposts()
    {
        return view("posts.getposts", ["posts" => $this->posts]);
    }

    function createpost()
    {
        return view("posts.createpost", ["posts" => $this->posts]);
    }

    function savepost()
    {
        $lastid = end($this->posts)['id'];
        $id = $lastid + 1;
        $post = [
            'id' => $id,
            'title' => $_POST['title'],
            'body' => $_POST['body'],
            'postedby' => $_POST['postedby'],
            'created at' => Carbon::now()->format('Y-m-d')
        ];
        $this->posts[] = $post;
        return view('posts.getposts', ["posts" => $this->posts]);
    }

    function showpost($id)
    {
        foreach ($this->posts as $post) {
            if ($post['id'] == $id) {
                return view("posts.showpost", ["post" => $post]);
            }
        }
        return view('notfound');
    }

    function editpost($id)
    {
        foreach ($this->posts as $post) {
            if ($post['id'] == $id) {
                return view("posts.editpost", ["post" => $post]);
            }
        }
        return view('notfound');
    }

    function deletepost($id)
    {
        foreach ($this->posts as $key => $post) {
            if ($post['id'] == $id) {
                unset($this->posts[$key]); //remove post
                // $this->posts = array_values($this->posts); //array updated
                return view('posts.getposts', ["posts" => $this->posts]);
            }
        }
        return view('notfound');
    }
}