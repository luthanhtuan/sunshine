<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    const CREATED_AT    = 'nv_taoMoi'; // create_at
    const UPDATED_AT    = 'nv_capNhat'; // updated_at

    protected $table        = 'nhanvien';
    protected $fillable     = ['nv_taiKhoan', 'nv_matKhau', 'nv_hoTen', 'nv_gioiTinh', 'nv_email', 'nv_ngaySinh', 'nv_diaChi', 'nv_dienThoai', 'nv_taoMoi', 'nv_capNhat', 'nv_trangThai'];
    protected $guarded      = ['nv_ma'];

    protected $primaryKey   = 'nv_ma';

    protected $dates        =  ['nv_taoMoi', 'nv_capNhat']; //Carbon\Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function quyen()
    {
        return $this->belongsTo('App\Quyen', 'q_ma', 'q_ma');   
    }
    public function donhangs()
    {
        return $this->hasMany('App\DonHang', 'vc_ma', 'vc_ma');
    }
}
