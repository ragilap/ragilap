<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = auth()->user();

        return response()->json([
            'users' => $users,
            'status' => 200
        ]);
    }

    public function crud()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }
}
