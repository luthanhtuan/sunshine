<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mau extends Model
{
    const CREATED_AT    = 'm_taoMoi'; // create_at
    const UPDATED_AT    = 'm_capNhat'; // updated_at

    protected $table        = 'mau';
    protected $fillable     = ['m_ten', 'm_taoMoi', 'm_capNhat', 'm_trangThai'];
    protected $guarded      = ['m_ma'];

    protected $primaryKey   = 'm_ma';

    protected $dates        =  ['m_taoMoi', 'm_capNhat']; //Carbon\Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function mau_sanphams()
    {
        return $this->hasMany('App\Mau_SanPham', 'm_ma', 'm_ma');
    }
    public function chitietdonhangs()
    {
        return $this->hasMany('App\ChiTietDonHang', 'm_ma', 'm_ma');
    }
    public function khuyenmai_sanphams()
    {
        return $this->hasMany('App\KhuyenMai_SanPham', 'm_ma', 'm_ma');
    }
    public function chitietnhaps()
    {
        return $this->hasMany('App\ChiTietNhap', 'm_ma', 'm_ma');
    }
}
