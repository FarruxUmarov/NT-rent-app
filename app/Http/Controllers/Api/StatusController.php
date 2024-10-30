<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Status::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $status = Status::query()->create([
            'name' => $request['name'],
        ]);

        return response()->json([
            'message' => 'Successfully created status!',
            'status' => 'success',
            'status_id' => $status
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $status  = Status::query()->findOrFail($id);
        return response()->json([
            'message' => 'Successfully created status!',
            'status' => 'success',
            'status_id' => $status
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        $status = Status::query()->findOrFail($id);
        $status->update([
            'name' => $request['name'],
        ]);

        return response()->json([
            'message' => 'Successfully updated status!',
            'status' => 'success',
            'status_id' => $status
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $status = Status::query()->findOrFail($id);
        $status->delete();
        return response()->json([
            'message' => 'Successfully deleted status!',
            'status' => 'success',
            'status_id' => $status
        ]);
    }
}