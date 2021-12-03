<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;

class MemberController extends Controller
{
    public function index() {
        $message = "Anggota";
        $event = Event::all();
        $data = User::all();
        return view('backend.master_data.member.index',compact(['message','data','event']));
    }

    public function create(Request $request){
        // dd($request->user_id);
        $request->validate([
            'event_id' => 'required',
        ]);

        $test = EventUser::where('user_id', $request->user_id)->where('event_id', $request->event_id)->get()->first();
        // dd($test);

        if(isset($test)){
            Alert::error($request->name . ' Sudah terdaftar pada kegiatan ini');
            return redirect()->back();
        }
        else{
            EventUser::create([
                'event_id' => $request->event_id,
                'user_id' => $request->user_id,
            ]);
            Alert::success('Success');
            return redirect()->back();
        }
    }
}
