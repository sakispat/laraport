<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\InstructorResource;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $instructors = Instructor::all();

            if($instructors) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'All instructors view data',
                    'instructors' => $instructors
                ], 200);
            }
        }catch(Exception $err) {
            return response()->json([
                'status' => 'error',
                'message' => 'Instructors not found'
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'priority' => 'required',
            'status' => 'required',
            'comment_status' => 'required',
            'title' => 'required|min:5|max:255',
            'short_title' => 'required|min:5|max:255',
            'subtitle' => 'required|min:5|max:255',
            'header' => 'required|min:5|max:255',
            'company' => 'required|min:5|max:255',
            'summary' => 'required',
            'body' => 'required',
            'ext_url' => 'required|min:5|max:255',
            'social_media' => 'required',
            'author_id' => 'required',
            'creator_id' => 'required',
            'created_at' => 'required|min:5|max:500',
            'updated_at' => 'required|min:5|max:500'
        ]);

        $instructor = Instructor::create([
            'priority' => $request->priority,
            'status' => $request->status,
            'comment_status' => $request->comment_status,
            'title' => $request->title,
            'short_title' => $request->short_title,
            'subtitle' => $request->subtitle,
            'header' => $request->header,
            'company' => $request->company,
            'summary' => $request->summary,
            'body' => $request->body,
            'ext_url' => $request->ext_url,
            'social_media' => $request->social_media,
            'author_id' => $request->author_id,
            'creator_id' => $request->creator_id,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Create instructor data',
            'instructor' => $instructor,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $instructor = Instructor::findOrFail($id);
        $response = new InstructorResource($instructor);

        return response()->json([
            'status' => 'success',
            'message' => 'Show instructor data',
            'instructor' => $response,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->update($request->only([
            'priority', 'status', 'comment_status', 'title', 'short_title',
            'subtitle', 'header', 'company', 'summary', 'body', 'ext_url',
            'social_media', 'author_id', 'creator_id', 'created_at', 'updated_at'
        ]));
        $instructor->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Update instructor data',
            'instructor' => $instructor
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $instructor = Instructor::findOrFail($id);
        $instructor->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Delete instructor data'
        ]);
    }
}
