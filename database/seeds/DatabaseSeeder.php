<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(VanChuyenTableSeeder::class);
        $this->call(ThanhToanTableSeeder::class);
        $this->call(LoaiTableSeeder::class);
        $this->call(KhachHangTableSeeder::class);
        $this->call(XuatXuTableSeeder::class);
        $this->call(MauTableSeeder::class);
        $this->call(ChuDeTableSeeder::class);
        $this->call(QuyenTableSeeder::class);
        $this->call(SanPhamTableSeeder::class);
        $this->call(NhanVienTableSeeder::class);
        $this->call(NhaCungCapTableSeeder::class);
        $this->call(HinhAnhTableSeeder::class);
        $this->call(DonHangTableSeeder::class);
        $this->call(Mau_SanPhamTableSeeder::class);
        $this->call(GopYTableSeeder::class);
        $this->call(ChuDe_SanPhamTableSeeder::class);
        $this->call(KhuyenMaiTableSeeder::class);
        $this->call(PhieuNhapTableSeeder::class);
        $this->call(ChiTietDonHangTableSeeder::class);
        $this->call(HoaDonSiTableSeeder::class);
        $this->call(HoaDonLeTableSeeder::class);
        $this->call(KhuyenMai_SanPhamTableSeeder::class);
        $this->call(ChiTietNhapTableSeeder::class);
    }
}
