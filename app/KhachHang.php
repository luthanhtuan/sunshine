<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    const CREATED_AT    = 'kh_taoMoi'; // create_at
    const UPDATED_AT    = 'kh_capNhat'; // updated_at

    protected $table        = 'khachhang';
    protected $fillable     = ['kh_ten', 'kh_taiKhoan', 'kh_matKhau', 'kh_hoTen', 'kh_gioiTinh', 'kh_email', 'kh_ngaySinh', 'kh_diaChi', 'kh_dienThoai', 'kh_taoMoi', 'kh_capNhat', 'kh_trangThai'];
    protected $guarded      = ['kh_ma'];

    protected $primaryKey   = 'kh_ma';

    protected $dates        =  ['kh_taoMoi', 'kh_capNhat']; //Carbon\Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function donhangs()
    {
        return $this->hasMany('App\DonHang', 'kh_ma', 'kh_ma');
    }
    public function gopys()
    {
        return $this->hasMany('App\GopY', 'kh_ma', 'kh_ma');
    }
}
