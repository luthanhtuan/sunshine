<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KhuyenMai_SanPhamTableSeeder extends Seeder
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
                'km_ma'                 => $faker->unique()->numberBetween(1, 100),
                'sp_ma'                 => $faker->numberBetween(1, 100),
                'm_ma'                  => $faker->numberBetween(1, 100),
                'kmsp_giaTri'           => $faker->text(50),
                'kmsp_trangThai'        => $faker->numberBetween(1, 2)
            ]);
        }
        DB::table('khuyenmai_sanpham')->insert($list);
    }
}
