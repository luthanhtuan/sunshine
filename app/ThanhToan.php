<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhToan extends Model
{
    const CREATED_AT    = 'tt_taoMoi'; // create_at
    const UPDATED_AT    = 'tt_capNhat'; // updated_at

    protected $table        = 'thanhtoan';
    protected $fillable     = ['tt_ten', 'tt_dienGiai', 'tt_taoMoi', 'tt_capNhat', 'tt_trangThai'];
    protected $guarded      = ['tt_ma'];

    protected $primaryKey   = 'tt_ma';

    protected $dates        =  ['tt_taoMoi', 'tt_capNhat']; //Carbon\Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function donhangs()
    {
        return $this->hasMany('App\DonHang', 'tt_ma', 'tt_ma');
    }
}
