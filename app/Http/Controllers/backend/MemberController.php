<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index() {
        $message = "Anggota";
        // $structure = Structure::all();
        $data = User::all();
        return view('backend.master_data.member.index',compact(['message','data']));
    }
}
