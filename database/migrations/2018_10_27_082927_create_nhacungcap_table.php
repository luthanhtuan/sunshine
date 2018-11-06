<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhacungcap', function (Blueprint $table) {

            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedSmallInteger('ncc_ma')
                ->autoIncrement()
                ->comment('Ma nha cung cap');

            $table->string('ncc_ten')
                ->unique()
                ->comment('Ten nha cung cap 191 ky tu');

            $table->string('ncc_daiDien', 100)
                ->comment('Dai dien nha cung cap 100 ky tu');

            $table->string('ncc_diaChi')
                ->comment('Dia chi nha cung cap 191 ky tu');

            $table->string('ncc_dienThoai', 17)
                ->comment('So dien thoai nhan vien 11 ky tu');

            $table->string('ncc_email', 100)
                ->comment('Email cua nha cung cap 100 ky tu');
            
            $table->timestamp('ncc_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi');

            $table->timestamp('ncc_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat');
            
            $table->unsignedTinyInteger('ncc_trangThai')
                ->default(2)
                ->comment('Trang thai: 1-Khoa, 2-Kha dung');
            
            $table->unsignedSmallInteger('xx_ma')
                ->comment('Ma xuat xu');
            
            $table->foreign('xx_ma')
                ->references('xx_ma')
                ->on('xuatxu')
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
        Schema::dropIfExists('nhacungcap');
    }
}
