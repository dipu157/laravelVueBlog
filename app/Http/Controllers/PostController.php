<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function all_posts(){

    	$posts = Post::with('category','user')->get();
    	return $posts;
    }
}