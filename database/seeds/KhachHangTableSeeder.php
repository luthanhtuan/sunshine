<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KhachHangTableSeeder extends Seeder
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
                'kh_taiKhoan'       => $faker->unique()->userName,
                'kh_matKhau'        => $faker->password,
                'kh_hoTen'          => $faker->name,
                'kh_gioiTinh'       => $faker->numberBetween(0, 1),
                'kh_email'          => $faker->unique()->email,
                'kh_ngaySinh'       => $faker->date('Y-m-d','now'),
                'kh_diaChi'         => $faker->address,
                'kh_dienThoai'      => $faker->unique()->phoneNumber,
                'kh_taoMoi'         => $created,
                'kh_capNhat'         => $updated,
                'kh_trangThai'      => $faker->numberBetween(1, 3)
            ]);
        }
        DB::table('khachhang')->insert($list);
    }
}
