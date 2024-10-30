<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(User::all());
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
        $request->validate([
            'username' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::query()->create([
            'username' => $request['username'],
            'position' => $request['position'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $token = $user->createToken($user->username)->plainTextToken;

        return response()->json([
            'message' => 'User created successfully',
            'status' => 'success',
            'user' => $user,
            'token' => $token,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $user = User::query()->findOrFail($id);
        return response()->json([
            'message' => 'User retrieved successfully',
            'status' => 'success',
            'user' => $user,
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
        $user = User::query()->findOrFail($id);
        $request->validate([
            'username' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'username' => $request['username'],
            'position' => $request['position'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return response()->json([
            'message' => 'User updated successfully',
            'status' => 'success',
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        $user = User::query()->findOrFail($id);
        $user->delete();
        return response()->json([
            'message' => 'User deleted successfully',
            'status' => 'success',
            'user' => $user,
        ]);
    }
}
