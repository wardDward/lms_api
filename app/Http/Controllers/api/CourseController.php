<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'category' => 'required|exists:categories,name',
            'price' => 'numeric|min:0',
            'level' => 'required',
            'lessons' => 'nullable|array',
            'lessons.*.title' => 'required|string',
            'lessons.*.video_url' => 'required|file|mimes:mp4',
            'lessons.*.description' => 'nullable|string',
            'lessons.*.order' => 'required|numeric',
        ]);

        $categoryId = Category::where('name', $request->category)->value('id');
        $course = Course::create([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'category_id' => $categoryId,
            'instructor_id' => 1,
            'price' => $data['price'] ?? 0.00,
            'level' => $data['level'],
        ]);

        if (!empty($data['lessons'])) {
            foreach ($data['lessons'] as $lessonData) {
                $videoPath = null;
                if (!empty($lessonData['video_url'])) {
                    $courseFolder = 'courses/' . slugMaker($course->title) . '/videos';
                    $videoPath = Storage::disk('public')->putFile($courseFolder, $lessonData['video_url']);
                }
                Lesson::create([
                    'title' => $lessonData['title'],
                    'course_id' => $course->id,
                    'slug' => slugMaker($lessonData['title']),
                    'description' => $lessonData['description'] ?? null,
                    'video_url' => $videoPath ?? null,
                    'order' => $lessonData['order']
                ]);
            }
        }

        return response()->json(['message' => 'Course created successfully!']);
    }

    public function show($course_id)
    {
        return Course::where('id', $course_id)->with(['lessons','courseOwner'])->get();
       
    }

}
