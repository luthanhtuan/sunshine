<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PhieuNhapTableSeeder extends Seeder
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
            $ngayXuatHoaDon = $now->copy()->addSeconds($faker->numberBetween(1, 259200));
            $ngayLapPhieu = $ngayXuatHoaDon->copy()->addMinutes($faker->numberBetween(1, 60));
            $ngayXacNhan = $ngayLapPhieu->copy()->addMinutes($faker->numberBetween(1, 180));
            $ngayNhapKho = $ngayXacNhan->copy()->addWeekdays($faker->numberBetween(1, 2));
            array_push($list, [
                'pn_nguoiGiao'                => $faker->name,
                'pn_soHoaDon'                 => $faker->unique()->text(15),
                'pn_ngayXuatHoaDon'           => $ngayXuatHoaDon,
                'pn_ghiChu'                   => $faker->text(250),
                'nv_nguoiLapPhieu'            => $faker->numberBetween(1, 100),
                'pn_ngayLapPhieu'             => $ngayLapPhieu,
                'nv_keToan'                   => $faker->numberBetween(1, 100),
                'pn_ngayXacNhan'              => $ngayXacNhan,
                'nv_thuKho'                   => $faker->numberBetween(1, 100),
                'pn_ngayNhapKho'              => $ngayNhapKho,
                'pn_taoMoi'                   => $created,
                'pn_capNhat'                  => $updated,
                'pn_trangThai'                => $faker->numberBetween(1, 2),
                'ncc_ma'                      => $faker->numberBetween(1, 100)
            ]);
        }
        DB::table('phieunhap')->insert($list);
    }
}
