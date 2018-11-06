<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HoaDonSiTableSeeder extends Seeder
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
            array_push($list, [
                'hds_nguoiMuaHang'      => $faker->name,
                'hds_tenDonVi'          => $faker->company,
                'hds_diaChi'            => $faker->address,
                'hds_maSoThue'          => $faker->isbn10,
                'hds_soTaiKhoan'        => $faker->creditCardNumber,
                'nv_lapHoaDon'          => $faker->numberBetween(1, 100),
                'hds_ngayXuatHoaDon'    => $times[$key],
                'nv_thuTruong'          => $faker->numberBetween(1, 100),
                'hds_taoMoi'            => $created,
                'hds_capNhat'           => $updated,
                'hds_trangThai'         => $faker->numberBetween(1, 2),
                'dh_ma'                 => $faker->numberBetween(1, 100),
                'tt_ma'                 => $faker->numberBetween(1, 100)
            ]);
        }
        DB::table('hoadonsi')->insert($list);
    }
}
