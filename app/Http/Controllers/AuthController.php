<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create() {
        return view('user.create');
    }

    public function storeUser(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

         $user = User::create([
            'id' => $request->id,
            'name' => $incomingFields['name'],
            'email' => $incomingFields['email'],
            'password' => bcrypt($incomingFields['password']),
        ]);
         Auth::login($user);

        return redirect()->route('user.dashboard', $user->id)->with('success', 'Registered successfully');

    }

    public function showLogin() {
        return view('user.login');
    }

    public function login(Request $request) {
              $incomingFields = $request->validate([
            'login_email' => 'required',
            'login_password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $incomingFields['login_email'],
            'password' => $incomingFields['login_password']
        ])) 
        {
            $request->session()->regenerate();
            
            $user = Auth::user();
        if ($user->role==5){
            return redirect()->route('admin.dashboard');
        }
            return redirect()->route('user.dashboard', Auth::id())->with('success', 'Login successful');

        }

        return back()->withErrors([
            'login' => 'Invalid credentials'
        ]);
    }

     public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
