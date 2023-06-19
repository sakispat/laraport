<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\EventUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EventUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $eventUsers = EventUser::all();

            if($eventUsers) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'All event users view data',
                    'eventUsers' => $eventUsers
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
            'event_id' => 'required',
            'user_id' => 'required',
            'paid' => 'required',
            'expiration' => 'required',
            'payment_method' => 'required',
            'comment' => 'required'
        ]);

        $eventUser = EventUser::create([
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
            'paid' => $request->paid,
            'expiration' => $request->expiration,
            'payment_method' => $request->payment_method,
            'comment' => $request->comment,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Create event user data',
            'eventUser' => $eventUser,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($user_id)
    {
        $eventUser = DB::select(
            "
                SELECT * FROM `event_users` eu
                LEFT JOIN `events` e ON eu.event_id = e.id
                WHERE eu.user_id = $user_id;
            "
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Show event user data',
            'eventUser' => $eventUser,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $eventUser = EventUser::findOrFail($id);
        $eventUser->update($request->only(['event_id', 'user_id', 'paid', 'expiration', 'payment_method', 'comment']));
        $eventUser->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Update event user data',
            'eventUser' => $eventUser
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $eventUser = EventUser::findOrFail($id);
        $eventUser->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Delete event user data'
        ]);
    }
}
