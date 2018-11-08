<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    const CREATED_AT    = 'km_taoMoi'; // create_at
    const UPDATED_AT    = 'km_capNhat'; // updated_at

    protected $table        = 'khuyenmai';
    protected $fillable     = ['km_ten', 'km_noiDung', 'km_datDau', 'km_ketThuc', 'km_giaTri', 'nv_nguoiLap', 'km_ngayLap', 'nv_kyNhay', 'km_ngayKyNhay', 'nv_kyDuyet', 'km_ngayDuyet', 'km_taoMoi', 'km_capNhat', 'km_trangThai'];
    protected $guarded      = ['km_ma'];

    protected $primaryKey   = 'km_ma';

    protected $dates        =  ['km_taoMoi', 'km_capNhat']; //Carbon\Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function nhanvien_nv_nguoiLap()
    {
        return $this->belongsTo('App\NhanVien', 'nv_nguoiLap', 'nv_ma');   
    }
    public function nhanvien_nv_kyNhay()
    {
        return $this->belongsTo('App\NhanVien', 'nv_kyNhay', 'nv_ma');   
    }
    public function nhanvien_nv_kyDuyet()
    {
        return $this->belongsTo('App\NhanVien', 'nv_kyDuyet', 'nv_ma');   
    }
    public function khuyenmai_sanphams()
    {
        return $this->hasMany('App\KhuyenMai_SanPham', 'km_ma', 'km_ma');
    }
}
