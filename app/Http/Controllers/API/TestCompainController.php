<?php

namespace App\Http\Controllers\API;

use App\Models\TestCompain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestCompainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compains = TestCompain::all();

        if(is_null($compains)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Compain not found'
            ], 401);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'All comapains view data',
            'compain' => $compains,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|min:10|max:15',
        ]);

        $compain = TestCompain::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Create compain data',
            'compain' => $compain,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $compain = TestCompain::find($id);

        if(is_null($compain)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Compain not found'
            ], 401);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Show compain data',
            'compain' => $compain,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:5|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|min:10|max:15',
        ]);

        $compain = TestCompain::find($id);
        $compain->update($request->all());
        $compain->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Update compain data',
            'compain' => $compain
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $compain = TestCompain::find($id);
        $compain->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Delete compain data'
        ]);
    }
}
