<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {

            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedSmallInteger('nv_ma')
                ->autoIncrement()
                ->comment('Ma nhan vien');

            $table->string('nv_taiKhoan', 50)
                ->unique()
                ->comment('Tai khoan nhan vien 50 ky tu');

            $table->string('nv_matKhau', 32)
                ->comment('Mat khau cua nhan vien 32 ky tu');

            $table->string('nv_hoTen', 100)
                ->comment('Ho ten nhan vien 100 ky tu');
            
            $table->unsignedTinyInteger('nv_gioiTinh')
                ->default(1)
                ->comment('Gioi tinh: 0-Nu, 1-Nam');
            
            $table->string('nv_email', 100)
                ->unique()
                ->comment('Email cua nhan vien 100 ky tu');
            
            $table->dateTime('nv_ngaySinh')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Ngay sinh nhan vien');
            
            $table->string('nv_diaChi')
                ->comment('Dia chi nhan vien 191 ky tu');
            
            $table->string('nv_dienThoai', 17)
                ->unique()
                ->comment('So dien thoai nhan vien 11 ky tu');
            
            $table->timestamp('nv_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi');
            
            $table->timestamp('nv_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat');
            
            $table->unsignedTinyInteger('nv_trangThai')
                ->default(2)
                ->comment('Trang thai: 1-Khoa, 2-Kha dung');
            
            $table->unsignedTinyInteger('q_ma')
                ->comment('Ma quyen: 1-Giam doc, 2-Quan tri, 3-Quan ly kho, 4-Ke toan, 5-Nhan vien ban hang, 6-Nhan vien giao hang');

            $table->foreign('q_ma')
                ->references('q_ma')
                ->on('quyen')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
