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
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;

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
        $check = Auth::check();
        if($check){
            $user = Auth::user();
            $currentTime = Carbon::now()->toTimeString();
            if($currentTime > '00:00:00' && $currentTime < '06:00:00'){
                $currentTime = 'Subuh';
            }
            else if ($currentTime > '06:00:00' && $currentTime < '11:00:00'){
                $currentTime = 'Pagi';
            }
            else if ($currentTime > '11:00:00' && $currentTime < '15:00:00'){
                $currentTime = 'Siang';
            }
            else if ($currentTime > '15:00:00' && $currentTime < '18:00:00'){
                $currentTime = 'Sore';
            }
            else {
                $currentTime = 'Malam';
            }
            // dd($currentTime);
            $event = $user->event;
            $check_code = $user->event;
            $data = Data::where('user_id',$user->id)->latest()->pluck('code_id')->toArray();
            // dd($data);
            $waktu = Carbon::now();
            return view('frontend.home.index',compact(['user','event','check_code','data','currentTime','waktu']));
        }
        else{
            return view('frontend.home.index');
        }
    }

    public function store(Request $request){
        $user = Auth::user();
        $request->validate([
            'code' => 'required',
        ]);
        $code = Data::where('code_id', $request->code_id)->where('user_id',$user->id)->get()->first();
        $currentTime = Carbon::now('Asia/jakarta');
        if($request->code == $request->cek){
            if(isset($code)){
                FacadesAlert::error('Anda sudah mengisi');
                return redirect()->back();
            }
            else {
                Data::create(
                    [
                        'user' => $user->name,
                        'code_id'=> $request->id,
                        'user_id'=> $user->id,
                        'description'=> $request->description,
                        'title' => $request->title,
                        'time' => $currentTime->toDateTimeString(),
                    ]
                );
                FacadesAlert::success('Sukses');
                return redirect()->back();
            }
        }
        else  {
            FacadesAlert::error('Kode Salah');
            return redirect()->back();
        }
    }

    public function addEvent(Request $request){
        $check = Event::where('name', $request->check_code)->value('id');
        // dd($check);
        if (isset($check)){
            $test = EventUser::where('user_id', Auth::user()->id)->where('event_id', $check)->get()->first();
            // dd($test);
            if(isset($test)){
                FacadesAlert::error($request->name . ' Sudah terdaftar pada kegiatan ini');
                return redirect()->back();
            }
            else{
                EventUser::create([
                    'event_id' => $check,
                    'user_id' => Auth::user()->id,
                ]);
                FacadesAlert::success('Success');
                return redirect()->back();
            }
        }
        else{
                FacadesAlert::error('Kode salah');
                return redirect()->back();
        }
    }
}
