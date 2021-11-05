<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Structure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index() {
        $message = "Kegiatan";
        $structure = Structure::all();
        $data = Event::all();
        return view('backend.master_data.event.index',compact(['message','data','structure']));
    }

    public function create(Request $request){
        // dd($request);
        $request->validate([
            'name' => 'required',
            'structure_id' => 'required',
        ]);

        $currentTime = Carbon::now();
        Event::create([
            'name' => $request->name,
            'status' => 1,
            'structure_id' => $request->structure_id
        ]);
        return redirect()->back();
    }
}
