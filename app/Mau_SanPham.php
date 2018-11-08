<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mau_SanPham extends Model
{
    public $timestapms = false;
    
    protected $table        = 'mau_sanpham';
    protected $fillable     = ['msp_soLuong'];
    protected $guarded      = ['sp_ma','m_ma'];

    protected $primaryKey   = ['sp_ma','m_ma'];

    public $incrementing = false;

    public function mau()
    {
        return $this->belongsTo('App\Mau', 'm_ma', 'm_ma');   
    }
    public function sanpham()
    {
        return $this->belongsTo('App\SanPham', 'sp_ma', 'sp_ma');   
    }
}
