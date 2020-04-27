<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function all_posts(){

    	 $posts = Post::with('category','user')->latest()->get();

    	return response()->json([

    		'posts' => $posts
    	],200);
    }

    public function savePost(Request $request){

        $this->validate($request,[
            'title' => 'required|min:2',
            'description' => 'required|min:20',
            'cat_id' => 'required'
        ]);

        $strpos = strpos($request->photo,';');
        $sub = substr($request->photo,0,$strpos);
        $ex=explode('/', $sub)[1];
        $name= time().".".$ex;
        $img = Image::make($request->photo)->resize(200,200);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);

    	$id = Auth::user()->id;

    	$post = new Post();
    	$post->title = $request->title;
    	$post->description = $request->description;
    	$post->cat_id = $request->cat_id;
    	$post->user_id = $id;
        $post->photo = $name;
    	$post->save();
    }

    public function deletePost($id){

        $post = Post::find($id);
        $image_path = public_path()."/uploadimage/";
        $image = $image_path.$post->photo;
        if(file_exists($image)){
            @unlink($image);
        }
         $post->delete();
     }

     public function editPost($id){
        
        $post = Post::find($id);
        return response()->json([
            'post' => $post
        ],200);
     }

     public function updatePost(Request $request,$id){

        $this->validate($request,[
            'title' => 'required|min:2',
            'description' => 'required|min:20',
            'cat_id' => 'required'
        ]);
        
        $post = Post::find($id);

        $strpos = strpos($request->photo,';');
        $sub = substr($request->photo,0,$strpos);
        $ex=explode('/', $sub)[1];
        $name= time().".".$ex;
        $img = Image::make($request->photo)->resize(200,200);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);

        $id = Auth::user()->id;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->cat_id = $request->cat_id;
        $post->user_id = $id;
        $post->photo = $name;
        $post->save();

        return ['message' => 'ok'];
     }
}
