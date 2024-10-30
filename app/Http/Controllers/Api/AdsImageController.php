<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AdsImage;
use Illuminate\Http\Request;

class AdsImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(AdsImage::all());
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
        $ad_image = AdsImage::query()->create([
            'ads_id' => AdsImage::query()->find($request['ads_id'])->id,
            'name' => $request['name'],
        ]);

        return response()->json([
            'message' => 'Ads image created successfully.',
            'status' => 'success',
            'ads_image' => $ad_image
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $ad_image = AdsImage::query()->findOrFail($id);

        return response()->json([
            'message' => 'Ads image retrieved successfully.',
            'status' => 'success',
            'ads_image' => $ad_image
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
        $ad_image = AdsImage::query()->findOrFail($id);
        $ad_image->update([
            'ads_id' => $request['ads_id'],
            'name' => $request['name'],
        ]);

        return response()->json([
            'message' => 'Ads image updated successfully.',
            'status' => 'success',
            'ads_image' => $ad_image
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $ad_image = AdsImage::query()->findOrFail($id);
        $ad_image->delete();
        return response()->json([
            'message' => 'Ads image deleted successfully.',
            'status' => 'success',
            'ads_image' => $ad_image
        ]);
    }
}
