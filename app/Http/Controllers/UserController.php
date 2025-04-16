<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'nama' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the user
        $user = new User();
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect or return a response
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    public function show($id)
    {
        // Fetch and display a single user
        return view('users.show', compact('id'));
    }
    public function edit($id)
    {
        $users = User::findOrFail($id);
        if (!$users) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }
        // Fetch the user for editing
        return view('users.edit', compact('users'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the user
        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->nama = $request->nama;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        // Redirect or return a response
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    public function destroy($id)
    {
        // Delete the user
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect or return a response
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
