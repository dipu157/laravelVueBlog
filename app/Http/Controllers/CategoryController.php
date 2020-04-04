<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    public function saveCategory(Request $request){

    	$this->validate($request,[
    		'cat_name' => 'required|min:2'
    	]);

    	$category = new Category();

    	$category->name = $request->cat_name;
    	$category->save();

    	return ['message' => 'ok'];
    }

    public function allCategory(){

    	$categories = Category::latest()->get();

    	return response()->json([
    		'categories' => $categories
    	],200);
    }

    public function deleteCategory($id){

        $category = Category::find($id);
        $category->delete();
    }

    public function editCategory($id){

        $category = Category::find($id);
        return response()->json([
            'category' => $category
        ],200);
    }

    public function updateCategory(Request $request,$id){

        $this->validate($request,[
            'cat_name' => 'required|min:2'
        ]);
        
        $category = Category::find($id);

        $category->name = $request->name;
        $category->save();

        return ['message' => 'ok'];
    }
}
