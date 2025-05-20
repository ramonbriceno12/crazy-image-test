<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterUserRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $path;
        }

        $data['password'] = Hash::make($data['password']);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'age' => $data['age'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'password' => $data['password'],
            'role' => $data['role'],
            'profile_picture' => $data['profile_picture'] ?? null,
        ]);

        return redirect('/login')->with('success', 'Account created!');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->with('error', 'Invalid credentials');
        }

        // Manually log in the user
        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
