<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class PostController extends Controller
{
    public function index(){
       return "This is the index"; 
    }

    public function viewPost($user)
    {
        return "This is a post of user $user";
    }
}
