<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $events = Event::all();

            if($events) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'All events view data',
                    'events' => $events
                ], 200);
            }
        }catch(Exception $err) {
            return response()->json([
                'status' => 'error',
                'message' => 'Event not found'
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
            'published' => 'required',
            'release_date_files' => 'required',
            'expiration' => 'required|min:5|max:255',
            'title' => 'required|min:5|max:255',
            'htmlTitle' => 'required',
            'subtitle' => 'required|min:5|max:255',
            'header' => 'required|min:5|max:255',
            'summary' => 'required',
            'body' => 'required',
            'hours' => 'required|min:5|max:255',
            'absences_limit' => 'required',
            'enroll' => 'required',
            'index' => 'required',
            'feed' => 'required',
            'certificate_title' => 'required',
            'fb_group' => 'required',
            'evaluate_topics' => 'required',
            'evaluate_instructors' => 'required',
            'fb_testimonial' => 'required',
            'author_id' => 'required',
            'creator_id' => 'required',
            'view_tpl' => 'required|min:5|max:255',
            'view_counter' => 'required',
            'published_at' => 'required|min:5|max:255',
            'created_at' => 'required|min:5|max:500',
            'updated_at' => 'required|min:5|max:500',
            'launch_date' => 'required|min:5|max:255',
            'xml_title' => 'required',
            'xml_description' => 'required',
            'xml_short_description' => 'required',
        ]);

        $event = Event::create([
            'priority' => $request->priority,
            'status' => $request->status,
            'published' => $request->published,
            'release_date_files' => $request->release_date_files,
            'expiration' => $request->expiration,
            'title' => $request->title,
            'htmlTitle' => $request->htmlTitle,
            'subtitle' => $request->subtitle,
            'header' => $request->header,
            'summary' => $request->summary,
            'body' => $request->body,
            'hours' => $request->hours,
            'absences_limit' => $request->absences_limit,
            'enroll' => $request->enroll,
            'index' => $request->index,
            'feed' => $request->feed,
            'certificate_title' => $request->certificate_title,
            'fb_group' => $request->fb_group,
            'evaluate_topics' => $request->evaluate_topics,
            'evaluate_instructors' => $request->evaluate_instructors,
            'fb_testimonial' => $request->fb_testimonial,
            'author_id' => $request->author_id,
            'creator_id' => $request->creator_id,
            'view_tpl' => $request->view_tpl,
            'view_counter' => $request->view_counter,
            'published_at' => $request->published_at,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,
            'launch_date' => $request->launch_date,
            'xml_title' => $request->xml_title,
            'xml_description' => $request->xml_description,
            'xml_short_description' => $request->xml_short_description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Create event data',
            'event' => $event,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $query = DB::select(
            "
                SELECT etli.id, etli.event_id, etli.topic_id, etli.lesson_id, etli.instructor_id,
                l.title as 'lesson_title', t.title as 'topic_title',
                t.summary as 'topic_title', i.title as 'instructor_title',
                i.subtitle as 'instructor_subtitle'
                FROM `event_topic_lesson_instructors` etli
                LEFT JOIN lessons l ON etli.lesson_id = l.id
                LEFT JOIN topics t ON etli.topic_id = t.id
                LEFT JOIN instructors i ON etli.instructor_id = i.id
                WHERE etli.event_id = $id;
            "
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Show event data',
            'event' => $query,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->only([
            'priority', 'status', 'published', 'release_date_files',
            'expiration', 'title', 'htmlTitle', 'subtitle', 'header',
            'summary', 'body', 'hours' , 'absences_limit', 'enroll',
            'index', 'feed', 'certificate_title', 'fb_group',
            'evaluate_topics', 'evaluate_instructors', 'fb_testimonial',
            'author_id', 'creator_id', 'view_tpl', 'view_counter',
            'published_at', 'created_at', 'updated_at', 'launch_date',
            'xml_title', 'xml_description', 'xml_short_description'
        ]));
        $event->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Update event data',
            'event' => $event
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Delete event data'
        ]);
    }
}
