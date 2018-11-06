<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    const CREATED_AT    = 'dh_taoMoi'; // create_at
    const UPDATED_AT    = 'dh_capNhat'; // updated_at

    protected $table        = 'donhang';
    protected $fillable     = ['dh_ten', 'dh_thoiGianDatHang', 'dh_thoiGianNhanHang', 'dh_nguoiNhan', 'dh_diaChi', 'dh_dienThoai', 'dh_nguoiGui', 'dh_loiChuc', 'dh_daThanhToan', 'nv_xuLy', 'dh_ngayXuLy', 'nv_giaoHang', 'dh_ngayLapPhieuGiao', 'dh_ngayGiaoHang', 'dh_taoMoi', 'dh_capNhat', 'dh_trangThai'];
    protected $guarded      = ['dh_ma'];

    protected $primaryKey   = 'dh_ma';

    protected $dates        =  ['dh_taoMoi', 'dh_capNhat']; //Carbon\Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function khachhang()
    {
        return $this->belongsTo('App\KhachHang', 'kh_ma', 'kh_ma');   
    }
    public function nv_xuLy()
    {
        return $this->belongsTo('App\NhanVien', 'nv_xuLy', 'nv_ma');   
    }
    public function nv_giaoHang()
    {
        return $this->belongsTo('App\NhanVien', 'nv_giaoHang', 'nv_ma');   
    }
    public function vanchuyen()
    {
        return $this->belongsTo('App\VanChuyen', 'vc_ma', 'vc_ma');   
    }
    public function thanhtoan()
    {
        return $this->belongsTo('App\ThanhToan', 'tt_ma', 'tt_ma');   
    }
}
