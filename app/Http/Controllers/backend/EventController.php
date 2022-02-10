<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Structure;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

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
        Alert::success('Data berhasil disimpan');
        return redirect()->back();
    }

    public function activate(Request $request){
        // dd($request->id);
        $event = Event::where('id', $request->id)->update(['status'=>$request->status]);
        $cek = Event::where('id', $request->id)->value('status');
        if($cek == 1){
            Alert::success('Data berhasil diaktivasi');
        }
        else{
            Alert::success('Data berhasil dinonaktif');
        }
        // $event->save();
        return redirect()->back();
    }

    public function delete($id){
        Event::where('id', $id)->delete();
        Alert::success('Data berhasil dihapus');
        return redirect()->back();
    }
}
