<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;

class SanPhamController extends Controller
{
    public function index()
    {
        $ds_sanpham = SanPham::all();
        //$ds_sanpham = DB::table('sanpham')->get();
        return view('sanpham.index')->with('danhsachsanpham', $ds_sanpham);
    }
}
