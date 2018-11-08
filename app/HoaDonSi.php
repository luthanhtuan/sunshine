<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonSi extends Model
{
    const CREATED_AT    = 'hds_taoMoi'; // create_at
    const UPDATED_AT    = 'hds_capNhat'; // updated_at

    protected $table        = 'hoadonsi';
    protected $fillable     = ['hds_nguoiMuaHang', 'hds_tenDonVi', 'hds_diaChi', 'hds_maSoThue', 'hds_soTaiKhoan', 'nv_lapHoaDon', 'hds_ngayXuatHoaDon', 'nv_thuTruong', 'hds_taoMoi', 'hds_capNhat', 'hds_trangThai', 'dh_ma', 'tt_ma'];
    protected $guarded      = ['hds_ma'];

    protected $primaryKey   = 'hds_ma';

    protected $dates        =  ['hds_taoMoi', 'hds_capNhat']; //Carbon\Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function donhang()
    {
        return $this->belongsTo('App\DonHang', 'dh_ma', 'dh_ma');   
    }
    public function thanhtoan()
    {
        return $this->belongsTo('App\ThanhToan', 'tt_ma', 'tt_ma');   
    }
    public function nhanvien_nv_lapHoaDon()
    {
        return $this->belongsTo('App\NhanVien', 'nv_lapHoaDon', 'nv_ma');   
    }
    public function nhanvien_nv_thuTruong()
    {
        return $this->belongsTo('App\NhanVien', 'nv_thuTruong', 'nv_ma');   
    }
}
