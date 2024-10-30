<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Roles::all());
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
        $roles = Roles::query()->create([
            'name' => $request['name'],
        ]);

        return response()->json([
            'message' => 'Role created successfully',
            'status' => 'success',
            'roles' => $roles
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $roles = Roles::query()->findOrFail($id);

        return response()->json([
            'message' => 'Role retrieved successfully',
            'status' => 'success',
            'roles' => $roles
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
        $roles = Roles::query()->findOrFail($id);
        $roles->update([
            'name' => $request['name'],
        ]);

        return response()->json([
            'message' => 'Role updated successfully',
            'status' => 'success',
            'roles' => $roles
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $roles = Roles::query()->findOrFail($id);
        $roles->delete();
        return response()->json([
            'message' => 'Role deleted successfully',
            'status' => 'success',
            'roles' => $roles
        ]);
    }
}
