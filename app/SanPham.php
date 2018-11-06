<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    const CREATED_AT    = 'sp_taoMoi'; // create_at
    const UPDATED_AT    = 'sp_capNhat'; // updated_at

    protected $table        = 'sanpham';
    protected $fillable     = ['sp_ten', 'sp_giaGoc', 'sp_giaBan', 'sp_hinh', 'sp_thongTin', 'sp_danhGia',  'sp_taoMoi', 'sp_capNhat', 'sp_trangThai'];
    protected $guarded      = ['sp_ma'];

    protected $primaryKey   = 'sp_ma';

    protected $dates        =  ['sp_taoMoi', 'sp_capNhat']; //Carbon\Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function loai()
    {
        return $this->belongsTo('App\Loai', 'l_ma', 'l_ma');   
    }
    public function hinhanhs()
    {
        return $this->hasMany('App\HinhAnh', 'sp_ma', 'sp_ma');
    }
}
