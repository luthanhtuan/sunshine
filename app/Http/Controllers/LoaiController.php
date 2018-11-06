<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loai;
use DB;
class LoaiController extends Controller
{
    public function index()
    {
        // $ds_loai = Loai::all();
        $ds_loai = DB::table('loai')->get();
        return view('loai.index')->with('danhsachloai', $ds_loai);
    }
}
