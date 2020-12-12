<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function init() {
        $user = Auth::user();
        return response()->json(['user' => $user], 200);
    }


    public function login(Request $request) {
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password], true)) {
            // return response()->json(Auth::user(), 200); 
            return response()->json(['status'=> true, 'message' =>'Login Successfully']);
            
        } else {
            // return response()->json(['error' => 'Could not log you in.']);
            return response()->json(['status' => false, 'message' => 'Invalid Email or Password']);
        }
    }

    public function register(Request $request) {
        
        $user = User::where('name', $request->name)->first();
        if(isset($user->id)) {
            return response()->json(['error' => 'Username already exists.'], 401);
        }

        $user = new User;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->save();
        Auth::login($user);
        return response()->json($user, 200);
    }

    public function logout() {
        Auth::logout();
    }
}
