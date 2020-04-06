<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    public function all_posts(){

    	 $posts = Post::with('category','user')->latest()->get();

    	return response()->json([

    		'posts' => $posts
    	],200);
    }

    public function savePost(Request $request){

    	$id = Auth::user()->id;

    	$post = new Post();
    	$post->title = $request->title;
    	$post->description = $request->description;
    	$post->cat_id = $request->cat_id;
    	$post->user_id = $id;
    	$post->save();
    }
}
