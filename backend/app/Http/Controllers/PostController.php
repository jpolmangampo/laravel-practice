<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    private $post;
    
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    
    // Create 
    #save
    public function save()
    {
        $this->post->title      = "Laravel 101";
        $this->post->content    = "Learning fundamentals of Laravel";
        $this->post->user_id    = 1;
        $this->post->save();

        // INSERT INTO posts(title, content, user_id) values ('Laravel 101', 'Learning fundamentals of Laravel', 1)
        return "New post added to database using save() eloquent";
    }

    #create
    public function create()
    {
        $new_post = [
            'title'     => 'Latest Movies',
            'content'   => 'There are many interesting movies to show this year.',
            'user_id'   => 5
        ];

        $this->post->create($new_post);

        return "New post saved using create() eloquent.";
    }



    //Read Update Delete



    // public function viewUserPost($username, $post_id)
    // {
    //     return "Post $post_id: This is the post of $username";
    // }

    // public function viewAllPosts()
    // {
    //     return view('view-all');
    //     // view() ~~ goes to the resources/views and looks for the view file.
    // }

    public function viewUserPost($username, $post_id)
    {
        return view('view-post')
                ->with('username', $username)
                ->with('post_id', $post_id);
        // with('blade_variable_name', $value);
    }

    public function viewAllPosts()
    {
        $all_posts = $this->post->all();
        // SELECT * FROM posts
        /*
        $all_posts = [
            [
            'id'        =>  1,
            'title'     => 'Laravel 101',
            'content'   => 'Learning fundamentals of Laravel',
            'user_id'   => 1,
            'created_at'=> '...',
            'updated_at'=> '...'
            ],
            [
            'id'        =>  2,
            'title'     => 'How to Stay Productive',
            'content'   => 'To be truly productive, you must first set your goals.',
            'user_id'   => 2,
            'created_at'=> '...',
            'updated_at'=> '...'
            ]
        ]
        */
        // foreach($all_posts as $post){
        //     echo "TITLE: $post->title";
        //     echo "<br>";
        //     echo $post->content;
        //     echo "<hr>";
        // }

        return view('view-all')
                ->with('all_posts', $all_posts);
    }

    public function show($post_id)
    {
        $post = $this->post->findOrFail($post_id);
        // SELECT * FROM posts WHERE id = $post_id

        return view('show')->with('post', $post);
            
    }

    public function showWhere($x){

        // $post = $this->post->where('id', $x)->get();
        // $post = $this->post->where('user_id', '<', $x)->get();
        // $post = $this->post->where('user_id', '<', $x)->latest()->get();
        // $post = $this->post->latest()->get();
        $post = $this->post->orderBy('title', 'DESC')->take(3)->get();

        foreach($post as $p){
            echo "TITLE: $p->title <br> $p->content <hr>";
        }

    }

    // public function viewAllPosts()
    // {
    //     $post_titles = [
    //         'Python vs Java',
    //         'The Cloud',
    //         'How to Stay Productive',
    //         'Coding during the Pandemic'
    //     ];

    //     return view('view-all')
    //             ->with('post_titles', $post_titles);
    // }

    // public function show($name)
    // {
    //     $post_titles = [
    //         'How to Make French Toast',
    //         'Japanese Cheesecake Recipe',
    //         'How to Cook Steak',
    //         'The Best Places in Tokyo for Shokupan Bread',
    //         'Cambodian Style Fried Chicken Wings'
    //     ];

    //     return view('show')
    //         ->with('posts', $post_titles)
    //         ->with('name', $name);
    // }
}
