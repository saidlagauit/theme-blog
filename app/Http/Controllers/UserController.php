<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->input('remember'))) {
            return redirect()->route('home');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|max:20',
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('auth.login')->with('success', 'Registration successful. Please log in.');
    }

    public function profile($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('auth.users.profile', compact('user'));
    }

    public function edit($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        return view('auth.users.edit', compact('user'));
    }

    public function update(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'imgAvatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:min_width=512,min_height=512',
            'bio' => 'nullable',
            'link_twitter' => 'nullable',
            'link_github' => 'nullable',
        ]);

        if ($request->hasFile('imgAvatar')) {
            $imgAvatar = $request->file('imgAvatar');
            $imgAvatarName = Str::random(20) . '.' . $imgAvatar->getClientOriginalExtension();
            $imgAvatar->storeAs('public/avatars', $imgAvatarName);
            $user->update(['avatar' => 'avatars/' . $imgAvatarName]);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'bio' => $request->bio,
            'link_twitter' => $request->link_twitter,
            'link_github' => $request->link_github,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function changePasswordForm($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('auth.users.change-password', compact('user'));
    }

    public function changePassword(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('auth.users.change-password', $user->username)->with('error', 'Current password is incorrect.');
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->route('auth.users.profile', $user->username)->with('success', 'Password changed successfully.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
