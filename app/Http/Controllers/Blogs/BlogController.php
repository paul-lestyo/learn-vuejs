<?php

namespace App\Http\Controllers\Blogs;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index() 
	{
		$blog = Blog::get();
		
		return response()->json([
			'status' => true,
			'data' => $blog
		],200);
	}

	public function show(Blog $blog) 
	{
		return response()->json([
			'status' => true,
			'data' => $blog
		],200);
	}

	public function update(Blog $blog) 
	{
		request()->validate([
			'category_id' => 'required|exists:categories,id',
			'title' => 'required',
			'description' => 'required'
		]);

		$category = Category::findOrFail(request('category_id'));
		$blog = tap($blog)->update([
			'category_id' => $category->id,
			'title' => request('title'),
			'description' => request('description')
		]);

		

		return response()->json([
			'status' => true,
			'data' => $blog
		],200);
	}

	public function store(Request $request) 
	{
		$request->validate([
			'category_id' => 'required|exists:categories,id',
			'title' => 'required',
			'description' => 'required'
		]);

		$category = Category::findOrFail($request->category_id);
		$blog = Blog::create([
			'category_id' => $category->id,
			'title' => $request->title,
			'slug' => Str::slug($request->title),
			'description' => $request->description
		]);

		return response()->json([
			'status' => true,
			'data' => $blog
		],200);
	}

	public function destroy(Blog $blog) 
	{
		$blog->delete();
		return response()->json([
			'status' => true,
		],200);
	}
}
