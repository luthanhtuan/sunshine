<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuDe;
use DB;

class ChudeController extends Controller
{
    public function index()
    {
        // $ds_chude = ChuDe::all();
        $ds_chude = DB::table('chude')->get();
        return view('chude.index')->with('danhsachchude', $ds_chude);
    }
}
