<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $lessons = Lesson::all();

            if($lessons) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'All lessons view data',
                    'lessons' => $lessons
                ], 200);
            }
        }catch(Exception $err) {
            return response()->json([
                'status' => 'error',
                'message' => 'Lesson not found'
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'title' => 'required',
            'htmlTitle' => 'required',
            'subtitle' => 'required|min:5|max:255',
            'header' => 'required|min:5|max:255',
            'summary' => 'required',
            'body' => 'required',
            'vimeo_video' => 'required|min:5|max:255',
            'vimeo_duration' => 'required|min:5|max:255',
            'links' => 'required',
            'bold' => 'required',
            'author_id' => 'required',
            'creator_id' => 'required',
            'published_at' => 'required|min:5|max:255',
            'created_at' => 'required|min:5|max:500',
            'updated_at' => 'required|min:5|max:500'
        ]);

        $lesson = Lesson::create([
            'status' => $request->status,
            'title' => $request->title,
            'htmlTitle' => $request->htmlTitle,
            'subtitle' => $request->subtitle,
            'header' => $request->header,
            'summary' => $request->summary,
            'body' => $request->body,
            'vimeo_video' => $request->vimeo_video,
            'vimeo_duration' => $request->vimeo_duration,
            'links' => $request->links,
            'bold' => $request->bold,
            'author_id' => $request->author_id,
            'creator_id' => $request->creator_id,
            'published_at' => $request->published_at,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Create lesson data',
            'lesson' => $lesson,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        $response = new LessonResource($lesson);

        return response()->json([
            'status' => 'success',
            'message' => 'Show lesson data',
            'lesson' => $response,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->update($request->only([
            'status', 'title', 'htmlTitle', 'subtitle', 'header',
            'summary', 'body', 'vimeo_video', 'vimeo_duration', 'links', 'bold',
            'author_id', 'creator_id', 'published_at', 'created_at', 'updated_at'
        ]));
        $lesson->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Update lesson data',
            'lesson' => $lesson
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Delete lesson data'
        ]);
    }
}
