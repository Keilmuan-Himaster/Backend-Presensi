<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Structure;
use Illuminate\Http\Request;

class StructureController extends Controller
{

    public function index() {
        $message = "Struktur";
        $data = Structure::all();
        return view('backend.master_data.structure.index',compact(['message','data']));
    }

    public function create(Request $request){
        // dd($request);
        $request->validate([
            'name' => 'required',
        ]);

        Structure::create([
            'name' => $request->name
        ]);
        return redirect()->back();
    }
}
