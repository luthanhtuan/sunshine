<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ThanhToanTableSeeder extends Seeder
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
                'tt_ten'            => $faker->unique()->name,
                'tt_dienGiai'       => $faker->text($faker->numberBetween(50, 250)),
                'tt_taoMoi'         => $created,
                'tt_capNhat'         => $updated,
                'tt_trangThai'      => $faker->numberBetween(1, 2)
            ]);
        }
        DB::table('thanhtoan')->insert($list);
    }
}
