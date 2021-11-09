<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\CodeUser;
use App\Models\Data;
use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $check = Auth::check();
        // if($check){
            $user = Auth::user();
            // dd($user);
            $event = $user->event;
            $check_code = $user->event;
            // dd($check_code);
            return view('frontend.home.index',compact(['user','event','check_code']));
    }

    public function store(Request $request){
        $user = Auth::user();
        $request->validate([
            'code' => 'required',
        ]);
        $code = Data::where('code_id', $request->event_id)->where('user_id',$user->id)->get()->first();
        // dd($code);
        $currentTime = Carbon::now('Asia/jakarta');
        if($request->code == $request->cek){
            if(isset($code)){
                return 'error dah ngisi';
            }
            else {
                Data::create(
                    [
                        'user' => $user->name,
                        'code_id'=> $request->id,
                        'user_id'=> $user->id,
                        'time' => $currentTime->toDateTimeString(),
                    ]
                );
                return 'success';
            }
        }
        else return 'error salah isi';
            }
}
