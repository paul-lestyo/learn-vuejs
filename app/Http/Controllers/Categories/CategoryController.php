<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;

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
}
