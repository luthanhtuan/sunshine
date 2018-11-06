<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XuatXu extends Model
{
    const CREATED_AT    = 'xx_taoMoi'; // create_at
    const UPDATED_AT    = 'xx_capNhat'; // updated_at

    protected $table        = 'xuatxu';
    protected $fillable     = ['xx_ten', 'xx_taoMoi', 'xx_capNhat', 'xx_trangThai'];
    protected $guarded      = ['xx_ma'];

    protected $primaryKey   = 'xx_ma';

    protected $dates        =  ['xx_taoMoi', 'xx_capNhat']; //Carbon\Carbon
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function nhacungcaps()
    {
        return $this->hasMany('App\NhaCungCap', 'xx_ma', 'xx_ma');
    }
}
