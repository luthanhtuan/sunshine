<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuDe_SanPham extends Model
{
    public $timestapms = false;
    
    protected $table        = 'chude_sanpham';
    protected $fillable     = [];
    protected $guarded      = ['sp_ma','cd_ma'];

    protected $primaryKey   = ['sp_ma','cd_ma'];

    public $incrementing = false;

    public function chude()
    {
        return $this->belongsTo('App\ChuDe', 'cd_ma', 'cd_ma');   
    }
    public function sanpham()
    {
        return $this->belongsTo('App\SanPham', 'sp_ma', 'sp_ma');   
    }
}
