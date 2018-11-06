<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DonHangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker      = Faker\Factory::create('vi_VN'); // zone
        $tz         = 'Asia/Ho_Chi_Minh'; //GMT+7 UTC
        $nComments  = 100;
        $now = new Carbon('2018-1-1', $tz);
        $times      = [];
        for ($i=1; $i <= $nComments; $i++)
            array_push($times, $faker->dateTimeThisYear('now', $tz));
        sort($times);
        $list = [];
        foreach ($times as $key => $value) {
            $created = $now->copy()->addSeconds($faker->numberBetween(1, 259200));
            $updated = $created->copy()->addSeconds($faker->numberBetween(1, 172800));
            $thoiGianDatHang = $now->copy()->addSeconds($faker->numberBetween(1, 259200));
            $ngayXuLy = $thoiGianDatHang->copy()->addMinutes($faker->numberBetween(1, 60));
            $ngayLapPhieuGiao = $ngayXuLy->copy()->addMinutes($faker->numberBetween(1, 180));
            $ngayGiaoHang = $ngayLapPhieuGiao->copy()->addMinutes($faker->numberBetween(60, 360));
            $thoiGianNhanHang = $thoiGianDatHang->copy()->addWeekdays($faker->numberBetween(1, 2));
            array_push($list, [
                'kh_ma'                 => $faker->numberBetween(1, 100),
                'dh_thoiGianDatHang'    => $thoiGianDatHang,
                'dh_thoiGianNhanHang'   => $thoiGianNhanHang,
                'dh_nguoiNhan'          => $faker->name,
                'dh_diaChi'             => $faker->address,
                'dh_dienThoai'          => $faker->unique()->phoneNumber,
                'dh_nguoiGui'           => $faker->name,
                'dh_loiChuc'            => $faker->text(250),
                'dh_daThanhToan'        => $faker->numberBetween(0, 1),
                'nv_xuLy'               => $faker->numberBetween(1, 100),
                'dh_ngayXuLy'           => $ngayXuLy,
                'nv_giaoHang'           => $faker->numberBetween(1, 100),
                'dh_ngayLapPhieuGiao'   => $ngayLapPhieuGiao,
                'dh_ngayGiaoHang'       => $ngayGiaoHang,
                'dh_taoMoi'             => $created,
                'dh_capNhat'            => $updated,
                'dh_trangThai'          => $faker->numberBetween(1, 2),
                'vc_ma'                 => $faker->numberBetween(1, 100),
                'tt_ma'                 => $faker->numberBetween(1, 100)
            ]);
        }
        DB::table('donhang')->insert($list);
    }
}
