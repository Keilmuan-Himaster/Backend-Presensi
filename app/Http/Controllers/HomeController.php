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
use Alert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified','auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index(Request $request)
    {
        // $check = Auth::check();
        // if($check){
            $user = Auth::user();
            // dd($user);
            $event = $user->event;
            $check_code = $user->event;
            $data = Data::where('status', 'done')->where('user_id',$user->id)->pluck('code_id')->toArray();
            // dd($data);
            return view('frontend.home.index',compact(['user','event','check_code','data']));
    }

    public function store(Request $request){
        $user = Auth::user();
        $request->validate([
            'code' => 'required',
        ]);
        $code = Data::where('code_id', $request->code_id)->where('user_id',$user->id)->get()->first();
        dd($code);
        $currentTime = Carbon::now('Asia/jakarta');
        if($request->code == $request->cek){
            if(isset($code)){
                Alert::error('Anda sudah mengisi');
                return redirect()->back();
            }
            else {
                Data::create(
                    [
                        'user' => $user->name,
                        'code_id'=> $request->id,
                        'user_id'=> $user->id,
                        'description'=> $request->description,
                        'time' => $currentTime->toDateTimeString(),
                    ]
                );
                Alert::success('Sukses');
                return redirect()->back();
            }
        }
        else  {
            Alert::error('salah isi');
            return redirect()->back();
        }
    }
}
