<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Branch;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Ads::all());
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
        $ad = Ads::query()->create([
            'title' => $request['title'],
            'description' => $request['description'],
            'user_id' => User::query()->find($request['user_id'])->id,
            'status_id' => Status::query()->find($request['status_id'])->id,
            'branch_id' => Branch::query()->find($request['branch_id'])->id,
            'address' => $request['address'],
            'price' => $request['price'],
            'rooms' => $request['rooms'],
        ]);

        return response()->json($ad);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $ad = Ads::query()->findOrFail($id);
        return response()->json([
            'message' => 'Ad created successfully.',
            'status' => 'success',
            'ad' => $ad
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
        $ad = Ads::query()->findOrFail($id);
        $ad->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'user_id' => $request['user_id'],
            'status_id' => $request['status_id'],
            'branch_id' => $request['branch_id'],
            'address' => $request['address'],
            'price' => $request['price'],
            'rooms' => $request['rooms'],
        ]);

        return response()->json([
            'message' => 'Ad created successfully.',
            'status' => 'success',
            'ad' => $ad
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $ad = Ads::query()->findOrFail($id);
        $ad->delete();

        return response()->json([
            'message' => 'Ad created successfully.',
            'status' => 'success',
            'ad' => $ad
        ]);
    }
}
