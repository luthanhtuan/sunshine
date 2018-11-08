<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    public $timestapms = false;
    
    protected $table        = 'chitietdonhang';
    protected $fillable     = ['ctdh_soLuong', 'ctdh_donGia'];
    protected $guarded      = ['dh_ma','sp_ma','m_ma'];

    protected $primaryKey   = ['dh_ma','sp_ma','m_ma'];

    public $incrementing = false;

    public function donhang()
    {
        return $this->belongsTo('App\DonHang', 'dh_ma', 'dh_ma');   
    }
    public function sanpham()
    {
        return $this->belongsTo('App\SanPham', 'sp_ma', 'sp_ma');   
    }
    public function mau()
    {
        return $this->belongsTo('App\Mau', 'm_ma', 'm_ma');   
    }
}
