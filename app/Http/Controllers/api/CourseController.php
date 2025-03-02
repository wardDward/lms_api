<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');

        $courses = Course::query()
            ->when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%$search%");
            })
            ->when($category, function ($query, $category) {
                return $query->whereHas('category', function ($q) use ($category) {
                    $q->where('name', 'LIKE', "%$category%");
                });
            })
            ->with('category')
            ->get();

        return response()->json($courses);
    }


}
