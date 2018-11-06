<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {

            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedBigInteger('sp_ma')
                ->autoIncrement()
                ->comment('Ma san pham');
            
            $table->string('sp_ten')
                ->unique()
                ->comment('Ten san pham 191 ky tu');
            
            $table->unsignedInteger('sp_giaGoc')
                ->default(0)
                ->comment('Gia goc san pham');
            
            $table->unsignedInteger('sp_giaBan')
                ->default(0)
                ->comment('Gia ban san pham');
            
            $table->string('sp_hinh')
                ->comment('Link hinh anh 191 ky tu');

            $table->text('sp_thongTin')
                ->comment('Thong tin san pham');

            $table->string('sp_danhGia', 50)
                ->comment('Danh gia san pham');

            $table->timestamp('sp_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi');

            $table->timestamp('sp_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat');

            $table->unsignedTinyInteger('sp_trangThai')
                ->default(2)
                ->comment('Trang thai: 1-Khoa, 2-Kha dung');

            $table->unsignedTinyInteger('l_ma')
                ->comment('Ma loai');

            $table->foreign('l_ma')
                ->references('l_ma')
                ->on('loai')
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
        Schema::dropIfExists('sanpham');
    }
}
