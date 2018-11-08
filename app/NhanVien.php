<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    const CREATED_AT    = 'nv_taoMoi'; // create_at
    const UPDATED_AT    = 'nv_capNhat'; // updated_at

    protected $table        = 'nhanvien';
    protected $fillable     = ['nv_taiKhoan', 'nv_matKhau', 'nv_hoTen', 'nv_gioiTinh', 'nv_email', 'nv_ngaySinh', 'nv_diaChi', 'nv_dienThoai', 'nv_taoMoi', 'nv_capNhat', 'nv_trangThai'];
    protected $guarded      = ['nv_ma'];

    protected $primaryKey   = 'nv_ma';

    protected $dates        =  ['nv_taoMoi', 'nv_capNhat']; //Carbon\Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function quyen()
    {
        return $this->belongsTo('App\Quyen', 'q_ma', 'q_ma');   
    }
    /*public function donhangs()
    {
        return $this->hasMany('App\DonHang', 'nv_xuLy')->orWhere('nv_giaoHang', $this->nv_ma);
    }*/
    public function donhangs_nv_xuLy()
    {
        return $this->hasMany('App\DonHang', 'nv_ma', 'nv_xuLy');
    }
    public function donhangs_nv_giaoHang()
    {
        return $this->hasMany('App\DonHang', 'nv_ma', 'nv_giaoHang');
    }
    // Khuyen mai
    public function khuyenmais_nv_nguoiLap()
    {
        return $this->hasMany('App\KhuyenMai', 'nv_ma', 'nv_nguoiLap');
    }
    public function khuyenmais_nv_kyNhay()
    {
        return $this->hasMany('App\KhuyenMai', 'nv_ma', 'nv_kyNhay');
    }
    public function khuyenmais_nv_kyDuyet()
    {
        return $this->hasMany('App\KhuyenMai', 'nv_ma', 'nv_kyDuyet');
    }
    // Phieu nhap
    public function phieunhaps_nv_nguoiLapPhieu()
    {
        return $this->hasMany('App\PhieuNhap', 'nv_ma', 'nv_nguoiLapPhieu');
    }
    public function phieunhaps_nv_keToan()
    {
        return $this->hasMany('App\PhieuNhap', 'nv_ma', 'nv_keToan');
    }
    public function phieunhaps_nv_thuKho()
    {
        return $this->hasMany('App\PhieuNhap', 'nv_ma', 'nv_thuKho');
    }
    public function hoadonsis_nv_lapHoaDon()
    {
        return $this->hasMany('App\HoaDonSi', 'nv_ma', 'nv_lapHoaDon');
    }
    public function hoadonsis_nv_thuTruong()
    {
        return $this->hasMany('App\HoaDonSi', 'nv_ma', 'nv_thuTruong');
    }
    public function hoadonles()
    {
        return $this->hasMany('App\HoaDonLe', 'nv_ma', 'nv_lapHoaDon');
    }
}
