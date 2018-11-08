<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietNhap extends Model
{
    public $timestapms = false;
    
    protected $table        = 'chitietnhap';
    protected $fillable     = ['ctn_soLuong', 'ctn_donGia'];
    protected $guarded      = ['pn_ma','sp_ma','m_ma'];

    protected $primaryKey   = ['pn_ma','sp_ma','m_ma'];

    public $incrementing = false;

    public function phieunhap()
    {
        return $this->belongsTo('App\PhieuNhap', 'pn_ma', 'pn_ma');   
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
