<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {

            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedBigInteger('kh_ma')
                ->autoIncrement()
                ->comment('Ma khach hang');

            $table->string('kh_taiKhoan', 50)
                ->unique()
                ->comment('Tai khoan khach hang 50 ky tu');

            $table->string('kh_matKhau', 32)
                ->comment('Mat khau cua khach hang 32 ky tu');

            $table->string('kh_hoTen', 100)
                ->comment('Ho ten khach hang 100 ky tu');

            $table->unsignedTinyInteger('kh_gioiTinh')
                ->default(1)
                ->comment('Gioi tinh: 0-Nu, 1-Nam');

            $table->string('kh_email', 100)
                ->unique()
                ->comment('Email cua khach hang 100 ky tu');

            $table->dateTime('kh_ngaySinh')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Ngay sinh khach hang');

            $table->string('kh_diaChi')
                ->nullable()
                ->comment('Dia chi khach hang co the null, mac dinh la null');

            $table->string('kh_dienThoai', 17)
                ->nullable()
                ->unique()
                ->comment('So dien thoai cua khach hang co the null, mac dinh la null');

            $table->timestamp('kh_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi');

            $table->timestamp('kh_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat');

            $table->unsignedTinyInteger('kh_trangThai')
                ->default(3)
                ->comment('Trang thai: 1-Khoa, 2-Kha dung, 3-Cho duyet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khachhang');
    }
}
