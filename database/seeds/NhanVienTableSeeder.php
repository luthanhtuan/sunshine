<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NhanVienTableSeeder extends Seeder
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
                'nv_taiKhoan'       => $faker->unique()->userName,
                'nv_matKhau'        => $faker->password,
                'nv_hoTen'          => $faker->name,
                'nv_gioiTinh'       => $faker->numberBetween(0, 1),
                'nv_email'          => $faker->unique()->email,
                'nv_ngaySinh'       => $faker->date('Y-m-d','now'),
                'nv_diaChi'         => $faker->address,
                'nv_dienThoai'      => $faker->unique()->phoneNumber,
                'nv_taoMoi'         => $created,
                'nv_capNhat'        => $updated,
                'nv_trangThai'      => $faker->numberBetween(1, 2),
                'q_ma'              => $faker->numberBetween(1, 100)
            ]);
        }
        DB::table('nhanvien')->insert($list);
    }
}
