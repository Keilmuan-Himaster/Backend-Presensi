<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Event;
use App\Models\Structure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CodeController extends Controller
{
    public function index() {
        $message = "Kode";
        $structure = Structure::all();
        $event = Event::all();
        $data = Code::orderBy('id', 'desc')->get();
        return view('backend.master_data.code.index',compact(['message','data','structure','event']));
    }

    public function create(Request $request){
        // dd($request);
        $request->validate([
            'title' => 'required',
            'event_id' => 'required',
        ]);
        // dd($request->place);
        $currentTime = Carbon::now('Asia/jakarta');
        $data=Code::create([
            'title' => $request->title,
            'code' => Str::slug($request->title,'-')."-".Str::random(5),
            'status' => 1,
            'start' => $currentTime->toDateTimeString(),
            'end' => $currentTime->addHour()->toDateTimeString(),
            'event_id' => $request->event_id,
            'place' => $request->place,
            'link' => $request->link,
            'desc' => $request->desc,
            // 'qr' => 'qr/'.$request->title.'png',
        ]);

        // dd(QrCode::format('png')->size(500)->generate($data->code));
        Storage::put('public/images/'.$data->code.'.png', QrCode::format('png')->size(500)->generate($data->code));
        // QrCode::size(500)->format('png')->generate($data->code);
        Alert::success('Data berhasil disimpan');
        return redirect()->back();
    }

    public function activate(Request $request){
        // dd($request->id);
        $code = Code::where('id', $request->id)->update(['status'=>$request->status]);
        // $event->save();
        $cek = Code::where('id', $request->id)->value('status');
        if($cek == 1){
            Alert::success('Data berhasil diaktivasi');
        }
        else{
            Alert::success('Data berhasil dinonaktif');
        }
        return redirect()->back();
    }

    public function delete($id){
        Code::where('id', $id)->delete();
        Alert::success('Data berhasil dihapus');
        return redirect()->back();
    }


}
