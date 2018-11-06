<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieunhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieunhap', function (Blueprint $table) {

            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->bigIncrements('pn_ma')
                ->comment('Ma phieu nhap');

            $table->string('pn_nguoiGiao', 100)
                ->comment('Nguoi giao');

            $table->string('pn_soHoaDon', 15)
                ->unique()
                ->comment('So hoa don');

            $table->dateTime('pn_ngayXuatHoaDon')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Ngay xuat hoa don');
            
            $table->text('pn_ghiChu')
                ->nullable()
                ->comment('Ghi chu');

            $table->unsignedSmallInteger('nv_nguoiLapPhieu')
                ->comment('Nguoi lap phieu');

            $table->dateTime('pn_ngayLapPhieu')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Ngay lap phieu');

            $table->unsignedSmallInteger('nv_keToan')
                ->default(1)
                ->comment('Nhan vien ke toan');

            $table->dateTime('pn_ngayXacNhan')
                ->nullable()
                ->comment('Ngay lap phieu');

            $table->unsignedSmallInteger('nv_thuKho')
                ->default(1)
                ->comment('Nhan vien thu kho');

            $table->dateTime('pn_ngayNhapKho')
                ->nullable()
                ->comment('Ngay nhap kho');

            $table->timestamp('pn_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi');

            $table->timestamp('pn_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat');

            $table->unsignedTinyInteger('pn_trangThai')
                ->default(2)
                ->comment('Trang thai: 1-Khoa, 2-Kha dung');

            $table->unsignedSmallInteger('ncc_ma')
                ->comment('Ma nha cung cap');

            $table->foreign('nv_nguoiLapPhieu')
                ->references('nv_ma')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('nv_keToan')
                ->references('nv_ma')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('nv_thuKho')
                ->references('nv_ma')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('ncc_ma')
                ->references('ncc_ma')
                ->on('nhacungcap')
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
        Schema::dropIfExists('phieunhap');
    }
}
