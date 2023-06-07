<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TopicResource;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $topics = Topic::all();

            if($topics) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'All topics view data',
                    'topics' => $topics
                ], 200);
            }
        }catch(Exception $err) {
            return response()->json([
                'status' => 'error',
                'message' => 'Topics not found'
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
            'summary' => 'required',
            'body' => 'required',
            'author_id' => 'required',
            'creator_id' => 'required',
            'email_template' => 'required|min:5|max:255',
            'created_at' => 'required|min:5|max:500',
            'updated_at' => 'required|min:5|max:500'
        ]);

        $topic = Topic::create([
            'priority' => $request->priority,
            'status' => $request->status,
            'comment_status' => $request->comment_status,
            'title' => $request->title,
            'short_title' => $request->short_title,
            'subtitle' => $request->subtitle,
            'header' => $request->header,
            'summary' => $request->summary,
            'body' => $request->body,
            'author_id' => $request->author_id,
            'creator_id' => $request->creator_id,
            'email_template' => $request->email_template,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Create topic data',
            'topic' => $topic,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic = Topic::findOrFail($id);
        $response = new TopicResource($topic);

        return response()->json([
            'status' => 'success',
            'message' => 'Show topic data',
            'topic' => $topic,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $topic = Topic::findOrFail($id);
        $topic->update($request->only([
            'priority', 'status', 'comment_status', 'title', 'short_title',
            'subtitle', 'header', 'summary', 'body', 'author_id',
            'creator_id', 'email_template', 'created_at', 'updated_at'
        ]));
        $topic->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Update topic data',
            'topic' => $topic
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::findOrFail($id);
        $topic->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Delete topic data'
        ]);
    }
}
