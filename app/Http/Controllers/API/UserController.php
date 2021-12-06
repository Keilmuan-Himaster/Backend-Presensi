<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Data;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();
        $event = $user->event;

        $data = Data::where('user_id', $user->id)->get();
        // dd($data);
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
            'history' => $data
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

    public function post(Request $request){
            $request->validate([
                'code' => 'required',
                'validate' => 'required',
                'description' => 'required|in:MOBILE-BIO,MOBILE'
            ]);
            $user = Auth::user();
            $code = Data::where('code_id', $request->id)->where('user',$user->name)->get()->first();
            // dd($code);
            $currentTime = Carbon::now('Asia/jakarta');
            if($request->code == $request->validate){
                if(isset($code)){
                    return ResponseFormatter::error([
                        'message' => 'You allready in'
                    ]);
                }
                else {
                    Data::create(
                        [
                            'user' => $user->name,
                            'code_id'=> $request->id,
                            'user_id'=> $user->id,
                            'title' => $request->title,
                            'description' => $request->description,
                            'time' => $currentTime->toDateTimeString(),
                        ]
                    );
                    return ResponseFormatter::success([
                        'message' => 'Success'
                    ]);
                }
            }
            else  {
                return ResponseFormatter::error([
                    'message' =>'wrong code'
                ]);
            }

    }
}
