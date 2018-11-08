<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    const CREATED_AT    = 'pn_taoMoi'; // create_at
    const UPDATED_AT    = 'pn_capNhat'; // updated_at

    protected $table        = 'phieunhap';
    protected $fillable     = ['pn_nguoiGiao', 'pn_soHoaDon', 'pn_ngayXuatHoaDon', 'pn_ghiChu', 'nv_nguoiLapPhieu', 'pn_ngayLapPhieu', 'nv_keToan', 'pn_ngayXacNhan', 'nv_thuKho', 'pn_ngayNhapKho', 'pn_taoMoi', 'pn_capNhat', 'pn_trangThai', 'ncc_ma'];
    protected $guarded      = ['pn_ma'];

    protected $primaryKey   = 'pn_ma';

    protected $dates        =  ['pn_taoMoi', 'pn_capNhat']; //Carbon\Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function nhacungcap()
    {
        return $this->belongsTo('App\NhaCungCap', 'ncc_ma', 'ncc_ma');   
    }

    public function nhanvien_nv_nguoiLapPhieu()
    {
        return $this->belongsTo('App\NhanVien', 'nv_nguoiLapPhieu', 'nv_ma');   
    }
    public function nhanvien_nv_keToan()
    {
        return $this->belongsTo('App\NhanVien', 'nv_keToan', 'nv_ma');   
    }
    public function nhanvien_nv_thuKho()
    {
        return $this->belongsTo('App\NhanVien', 'nv_thuKho', 'nv_ma');   
    }
    public function chitietnhaps()
    {
        return $this->hasMany('App\ChiTietNhap', 'pn_ma', 'pn_ma');
    }
}
