<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonLe extends Model
{
    public $timestapms = false;
    
    protected $table        = 'hoadonle';
    protected $fillable     = ['hdl_nguoiMuaHang', 'hdl_dienThoai', 'hdl_diaChi', 'nv_lapHoaDon', 'hdl_ngayXuatHoaDon', 'dh_ma'];
    protected $guarded      = ['hdl_ma'];

    protected $primaryKey   = ['hdl_ma'];

    protected $dateFormat   = 'Y-m-d H:i:s';

    public function donhang()
    {
        return $this->belongsTo('App\DonHang', 'dh_ma', 'dh_ma');   
    }
    public function nhanvien()
    {
        return $this->belongsTo('App\NhanVien', 'nv_lapHoaDon', 'nv_ma');   
    }
}
