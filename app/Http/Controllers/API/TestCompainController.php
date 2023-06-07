<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\TestCompain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TestCompainResource;

class TestCompainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $compains = TestCompain::all();

            if($compains) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'All comapains view data',
                    'compains' => $compains
                ], 200);
            }
        }catch(Exception $err) {
            return response()->json([
                'status' => 'error',
                'message' => 'Compain not found'
            ], 500);
        }
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
    public function show($id)
    {
        $compain = TestCompain::findOrFail($id);
        $response = new TestCompainResource($compain);

        return response()->json([
            'status' => 'success',
            'message' => 'Show compain data',
            'compain' => $response,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $compain = TestCompain::findOrFail($id);
        $compain->update($request->only(['name', 'address', 'phone']));
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
    public function destroy($id)
    {
        $compain = TestCompain::findOrFail($id);
        $compain->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Delete compain data'
        ]);
    }
}
