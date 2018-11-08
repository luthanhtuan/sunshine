<?php

use Illuminate\Database\Seeder;

class HoaDonLeTableSeeder extends Seeder
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
        $times      = [];
        for ($i=1; $i <= $nComments; $i++)
            array_push($times, $faker->dateTimeThisYear('now', $tz));
        sort($times);
        $list = [];
        foreach ($times as $key => $value) {
            array_push($list, [
                'hdl_nguoiMuaHang'      => $faker->name,
                'hdl_dienThoai'         => $faker->phoneNumber,
                'hdl_diaChi'            => $faker->address,
                'nv_lapHoaDon'          => $faker->numberBetween(1, 100),
                'hdl_ngayXuatHoaDon'    => $times[$key],
                'dh_ma'                 => $faker->numberBetween(1, 100)
            ]);
        }
        DB::table('hoadonle')->insert($list);
    }
}
