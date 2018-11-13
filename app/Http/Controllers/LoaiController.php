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
    public function create()
    {
        return view('loai.create');
    }
    public function store(Request $request)
    {
        $loai               = new Loai();
        $loai->l_ten        = $request->l_ten;
        $loai->l_taoMoi     = $request->l_taoMoi;
        $loai->l_capNhat    = $request->l_capNhat;
        $loai->l_trangThai  = $request->l_trangThai;
        $loai->save();
    }
}
