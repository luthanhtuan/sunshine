<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai_SanPham extends Model
{
    public $timestapms = false;
    
    protected $table        = 'khuyenmai_sanpham';
    protected $fillable     = ['kmsp_giaTri', 'kmsp_trangThai'];
    protected $guarded      = ['km_ma','sp_ma','m_ma'];

    protected $primaryKey   = ['km_ma','sp_ma','m_ma'];

    public $incrementing = false;

    public function khuyenmai()
    {
        return $this->belongsTo('App\KhuyenMai', 'km_ma', 'km_ma');   
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
