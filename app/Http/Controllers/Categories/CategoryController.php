<?php

namespace App\Http\Controllers\Categories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() 
	{
		$categories = Category::get();

		return response()->json([
			'status' => true,
			'data' => $categories
		]);
	}

	public function show(Category $category) 
	{
		return response()->json([
			'status' => true,
			'data' => $category
		],200);
	}

	public function update(Category $category) 
	{
		request()->validate([
			'name' => 'required',
		]);

		$category = tap($category)->update([
			'name' => request('name'),
			'slug' => Str::slug(request('name'))
		]);

		

		return response()->json([
			'status' => true,
			'data' => $category
		],200);
	}

	public function store(Request $request) 
	{
		$request->validate([
			'name' => 'required',
		]);

		$category = Category::create([
			'name' => $request->name,
			'slug' => Str::slug(request('name'))
		]);

		return response()->json([
			'status' => true,
			'data' => $category
		],200);
	}

	public function destroy(Category $category) 
	{
		$category->delete();
		return response()->json([
			'status' => true,
		],200);
	}
}
