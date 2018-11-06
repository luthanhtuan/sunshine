<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonsi', function (Blueprint $table) {

            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->bigIncrements('hds_ma')
                ->comment('Ma hoa don si');
            
            $table->string('hds_nguoiMuaHang', 100)
                ->comment('Nguoi mua hang');

            $table->string('hds_tenDonVi')
                ->comment('Ten don vi');

            $table->string('hds_diaChi')
                ->comment('Dia chi');

            $table->string('hds_maSoThue', 14)
                ->comment('Ma so thue');

            $table->string('hds_soTaiKhoan', 20)
                ->nullable()
                ->comment('So tai khoan');

            $table->unsignedSmallInteger('nv_lapHoaDon')
                ->comment('Nguoi lap hoa don');

            $table->dateTime('hds_ngayXuatHoaDon')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Ngay xuat hoa don');

            $table->unsignedSmallInteger('nv_thuTruong')
                ->default(1)
                ->comment('Nguoi lap hoa don');
            
            $table->timestamp('hds_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi');

            $table->timestamp('hds_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat');

            $table->unsignedTinyInteger('hds_trangThai')
                ->default(1)
                ->comment('Trang thai: 1-Khoa, 2-Kha dung');

            $table->unsignedBigInteger('dh_ma')
                ->default(1)
                ->comment('Ma don hang');

            $table->unsignedTinyInteger('tt_ma')
                ->comment('Ma thanh toan');

            $table->foreign('nv_lapHoaDon')
                ->references('nv_ma')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('nv_thuTruong')
                ->references('nv_ma')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('dh_ma')
                ->references('dh_ma')
                ->on('donhang')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('tt_ma')
                ->references('tt_ma')
                ->on('thanhtoan')
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
        Schema::dropIfExists('hoadonsi');
    }
}
