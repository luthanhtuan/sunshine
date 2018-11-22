<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\Loai;
use Session;

class SanPhamController extends Controller
{
    public function index()
    {
        $ds_sanpham = SanPham::all();
        //$ds_sanpham = DB::table('sanpham')->get();
        return view('sanpham.index')->with('danhsachsanpham', $ds_sanpham);
    }
    public function create()
    {
        $ds_loai = Loai::all();
        return view('sanpham.create')
            ->with('danhsachloai', $ds_loai);
    }
    public function store(Request $request)
    {
        $validation = $request->validate([
            'sp_hinh' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
            //Cú pháp dùng upload nhiều file
        ]);
        $sp = new SanPham();
        $sp->sp_ten = $request->sp_ten;
        $sp->sp_giaGoc = $request->sp_giaGoc;
        $sp->sp_giaBan = $request->sp_giaBan;
        $sp->sp_thongTin = $request->sp_thongTin;
        $sp->sp_danhGia = $request->sp_danhGia;
        $sp->sp_taoMoi = $request->sp_taoMoi;
        $sp->sp_capNhat = $request->sp_capNhat;
        $sp->sp_trangThai = $request->sp_trangThai;
        $sp->l_ma = $request->l_ma;

        if($request->hasFile('sp_hinh'))
        {
            $file = $request->sp_hinh;
            // Luu ten hinh vao column sp_hinh
            $sp->sp_hinh = $file->getClientOriginalName();

            // Chep file vao thu muc "photos"
            $fileSaved = $file->storeAs('public/photos', $sp->sp_hinh);
        }
        $sp->save();
        Session::flash('alert-info', 'Them moi thanh cong ^^~!!!');
        return redirect()->route('danhsachsanpham.index');
    }
}
