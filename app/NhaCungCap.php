<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    const CREATED_AT    = 'ncc_taoMoi'; // create_at
    const UPDATED_AT    = 'ncc_capNhat'; // updated_at

    protected $table        = 'nhacungcap';
    protected $fillable     = ['ncc_ten', 'ncc_daiDien', 'ncc_diaChi', 'ncc_dienThoai', 'ncc_email', 'ncc_taoMoi', 'ncc_capNhat', 'ncc_trangThai'];
    protected $guarded      = ['ncc_ma'];

    protected $primaryKey   = 'ncc_ma';

    protected $dates        =  ['ncc_taoMoi', 'ncc_capNhat']; //Carbon\Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function xuatxu()
    {
        return $this->belongsTo('App\XuatXu', 'xx_ma', 'xx_ma');   
    }
}
