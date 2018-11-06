<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KhuyenMaiTableSeeder extends Seeder
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
            $batDau = $now->copy()->addSeconds($faker->numberBetween(1, 259200));
            $ngayLap = $batDau->copy()->addMinutes($faker->numberBetween(1, 60));
            $ngayKyNhay = $ngayLap->copy()->addMinutes($faker->numberBetween(1, 180));
            $ngayKyDuyet = $ngayKyNhay->copy()->addMinutes($faker->numberBetween(60, 360));
            $ketThuc = $ngayKyDuyet->copy()->addWeekdays($faker->numberBetween(1, 2));
            array_push($list, [
                'km_ten'                => $faker->name,
                'km_noiDung'            => $faker->text(250),
                'km_batDau'             => $batDau,
                'km_ketThuc'            => $ketThuc,
                'km_giaTri'             => $faker->text(50),
                'nv_nguoiLap'           => $faker->numberBetween(1, 100),
                'km_ngayLap'            => $ngayLap,
                'nv_kyNhay'             => $faker->numberBetween(1, 100),
                'km_ngayKyNhay'         => $ngayKyNhay,
                'nv_kyDuyet'            => $faker->numberBetween(1, 100),
                'km_ngayDuyet'          => $ngayKyDuyet,
                'km_taoMoi'             => $created,
                'km_capNhat'            => $updated,
                'km_trangThai'          => $faker->numberBetween(1, 2)
            ]);
        }
        DB::table('khuyenmai')->insert($list);
    }
}
