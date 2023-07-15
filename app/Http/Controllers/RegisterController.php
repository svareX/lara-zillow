<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Show register page.
     */
    public function create()
    {
        return inertia('Auth/Register');
    }

    /**
     * Register.
     */
    public function store(Request $request)
    {
        $user = User::create(
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed',
            ])
        );
        Auth::login($user);
        return redirect()->route('listing.index')
            ->with('success', 'Account created!');
    }
}
