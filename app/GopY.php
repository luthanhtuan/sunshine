<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GopY extends Model
{
    public $timestapms = false;
    
    protected $table        = 'gopy';
    protected $fillable     = ['gy_thoiGian', 'gy_noiDung', 'km_ma', 'sp_ma', 'gy_trangThai'];
    protected $guarded      = ['gy_ma'];

    protected $primaryKey   = ['gy_ma'];

    protected $dateFormat   = 'Y-m-d H:i:s';

    public function khachhang()
    {
        return $this->belongsTo('App\KhachHang', 'kh_ma', 'kh_ma');   
    }
    public function sanpham()
    {
        return $this->belongsTo('App\SanPham', 'sp_ma', 'sp_ma');   
    }
}
