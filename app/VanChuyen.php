<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VanChuyen extends Model
{
    const CREATED_AT    = 'vc_taoMoi'; // create_at
    const UPDATED_AT    = 'vc_capNhat'; // updated_at

    protected $table        = 'vanchuyen';
    protected $fillable     = ['vc_ten', 'vc_chiPhi', 'vc_dienGiai', 'vc_taoMoi', 'vc_capNhat', 'vc_trangThai'];
    protected $guarded      = ['vc_ma'];

    protected $primaryKey   = 'vc_ma';

    protected $dates        =  ['vc_taoMoi', 'vc_capNhat']; //Carbon\Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function donhangs()
    {
        return $this->hasMany('App\DonHang', 'vc_ma', 'vc_ma');
    }
}
