<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Event;
use App\Models\Structure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CodeController extends Controller
{
    public function index() {
        $message = "Kode";
        $structure = Structure::all();
        $event = Event::all();
        $data = Code::all();
        return view('backend.master_data.code.index',compact(['message','data','structure','event']));
    }

    public function create(Request $request){
        // dd($request);
        $request->validate([
            'title' => 'required',
            'event_id' => 'required',
        ]);

        $currentTime = Carbon::now('Asia/jakarta');
        Code::create([
            'title' => $request->title,
            'code' => Str::slug($request->title,'-')."-".Str::random(5),
            'status' => 1,
            'start' => $currentTime->toDateTimeString(),
            'end' => $currentTime->addHour()->toDateTimeString(),
            'event_id' => $request->event_id
        ]);
        return redirect()->back();
    }


}
