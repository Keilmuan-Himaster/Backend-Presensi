<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();
        // dd($user);
        $event = $user->event;

        foreach ($event as $code){
            foreach($code->code as $code){
                if ($code->status == 0)
                continue;
                else {
                    $code->get();
                }
            }
        }

        return ResponseFormatter::success([
            'user' => $user,
        ]);
    }
    public function login(Request $request){
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required',
            ]);
            $credentials = request(['email','password']);

            if(!Auth::attempt($credentials)){
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ],'Authentication Failed', 500);
            }

            $user = User::where('email', $request['email'])->first();

            if(!Hash::check($request['password'],$user->password, [])) {
                throw new \Exception('Invalid credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ],'Authenticated');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Unauthorized',
                'error' => $error,
            ],'Authentication Failed', 500);
        }
    }
}
