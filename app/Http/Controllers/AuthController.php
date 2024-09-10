<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // Show Sign Up form
    public function showSignUp()
    {
        return view('auth.register'); // make sure this Blade exists
    }

    // Handle Sign Up (POST)
    public function signUp(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
            'agree'=>'accepted'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'attendee' // default
        ]);

        
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message'=>'User registered',
            'token'=>$token,
            'redirect_url'=>'/attende/dashboard'
        ]);
    }

    // Show Sign In form
    public function showSignIn()
    {
        return view('auth.login'); // make sure this Blade exists
    }

    // Handle Sign In (POST)
    public function signIn(Request $request)
    {
        $credentials = $request->only('email','password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error'=>'Invalid credentials'],401);
        }

            $attendees = User::all(); 


        $user = auth()->user();
        $redirect_url = $user->role=='organiser' ? '/organiser/dashboard' : '/';

        return response()->json([
            'message'=>'Login successful',
            'token'=>$token,
            'redirect_url'=>$redirect_url
        ]);
    }

    
    // Logout (invalidate JWT)
 public function logout(Request $request)
{

    
    // JWTAuth::invalidate(JWTAuth::getToken());
    return redirect('/login'); // send user to login page
}



  public function getAttendeeList($emailToSend = null)
    {
        // Get all attendees/users from database
        $attendees = User::all(); // Or Attendee::all() if separate model

        // If an email is provided, send attendee list
        if ($emailToSend) {
            Mail::to($emailToSend)->send(new AttendeeListMail($attendees));
        }

        // Return list as collection or array
        return $attendees;
    }
    
}
