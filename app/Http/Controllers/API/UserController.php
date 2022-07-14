<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Data;
use App\Models\Event;
use App\Models\GambarUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct(){

    }
    public function index() {
        $user = Auth::user();
        $getUser = Auth::user();
        $event = $getUser->event;
        // $data = Data::where('user_id', $user->id)->get();
        // dd($user->id);
        $data = Data::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        foreach ($event as $event){
            foreach($event->code as $get){
                if ($get->status == 0)
                continue;
                else {
                    $get->get();
                    // dd($d);
                }
                // dd($event);
            }
        }
        return ResponseFormatter::success([
            'user' => $getUser,
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

    public function register(Request $request){
        try{
            $request->validate([
                'name' => ['required','string','max:255'],
                'email' => ['required','string','max:255','unique:users'],
                'password' => ['required','string'],
            ]);
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 2,
            ]);
            $user = User::where('email',$request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'User Registered');
        }
        catch(Exception $error){
            return ResponseFormatter::success([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'User Unregistered', 500);
        }
    }
    public function logout(Request $request) {
        $token = $request->user()->currentAccessToken()->delete();
        return ResponseFormatter::success($token, 'Token Revoked');
    }

    public function cek(Request $request){
        $user = Auth::user();
        $image=new GambarUser();
        // dd($request->image);
        if($request->hasfile('image'))
        {
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            // Storage::put('public/image'.$filename, $filename);
            $file->move('storage/image/',$filename);
            // Storage::put('public/image/'.$request->image, $filename);
            $image->image=$filename;
            // dd($user->id);
            return ResponseFormatter::success([
                'message' => 'Success'
            ]);
        }
        else
        {
            return ResponseFormatter::error([
                'message' => 'not found'
            ]);
        }
        // $imageName = time().'.'.$request->image->extension();
        // $request->image->move(public_path('images'), $imageName);
        // $user->image = $imageName;

    }
}
