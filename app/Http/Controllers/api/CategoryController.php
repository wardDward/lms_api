<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return $categories;
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable'
        ]);

        $category = Category::create([
            'name' => $data['name'],
            'slug' => slugMaker($data['name']),
            'description' => $data['description']
        ]);

        return $category;
    }
}
