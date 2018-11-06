<?php

use Illuminate\Database\Seeder;

class GopYTableSeeder extends Seeder
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
                'gy_thoiGian'       => $times[$key],
                'gy_noiDung'        => $faker->text($faker->numberBetween(50, 250)),
                'kh_ma'             => $faker->numberBetween(1, 100),
                'sp_ma'             => $faker->numberBetween(1, 100),
                'gy_trangThai'      => $faker->numberBetween(1, 3)
            ]);
        }
        DB::table('gopy')->insert($list);
    }
}
