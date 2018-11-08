<?php

use Illuminate\Database\Seeder;

class HinhAnhTableSeeder extends Seeder
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
            $num = $faker->unique()->numberBetween(1, 100);
            array_push($list, [
                'sp_ma'            => $num,
                //'ha_stt'           => $faker->unique()->numberBetween(1, 100),
                'ha_stt'           => $num,
                'ha_ten'           => $faker->text(50)
            ]);
        }
        DB::table('hinhanh')->insert($list);
    }
}
