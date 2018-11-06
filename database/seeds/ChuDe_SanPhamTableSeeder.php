<?php

use Illuminate\Database\Seeder;

class ChuDe_SanPhamTableSeeder extends Seeder
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
                'sp_ma'            => $faker->unique()->numberBetween(1, 100),
                'cd_ma'             => $faker->numberBetween(1, 100)
            ]);
        }
        DB::table('chude_sanpham')->insert($list);
    }
}
