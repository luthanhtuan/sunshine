<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            
            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedBigInteger('dh_ma')
                ->autoIncrement()
                ->comment('Ma don hang');

            $table->unsignedBigInteger('kh_ma')
                ->comment('Ma khach hang');
            
            $table->dateTime('dh_thoiGianDatHang')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi gian dat hang');
            
            $table->dateTime('dh_thoiGianNhanHang')
                ->comment('Thoi gian nhan hang');

            $table->string('dh_nguoiNhan', 100)
                ->comment('Nguoi nhan 100 ky tu');
            
            $table->string('dh_diaChi')
                ->comment('Dia chi nguoi nhan 191 ky tu');
            
            $table->string('dh_dienThoai', 17)
                ->comment('So dien thoai 11 ky tu');
            
            $table->string('dh_nguoiGui', 100)
                ->comment('Nguoi gui 100 ky tu');

            $table->text('dh_loiChuc')
                ->nullable()
                ->comment('Loi chuc co the null');
            
            $table->unsignedTinyInteger('dh_daThanhToan')
                ->default(0)
                ->comment('Don hang da thanh toan mac dinh 0');
            
            $table->unsignedSmallInteger('nv_xuLy')
                ->default(1)
                ->comment('Nhan vien xu ly');
            
            $table->dateTime('dh_ngayXuLy')
                ->nullable()
                ->comment('Ngay xu ly don hang');
            
            $table->unsignedSmallInteger('nv_giaoHang')
                ->default(1)
                ->comment('Nhan vien giao hang');
            
            $table->dateTime('dh_ngayLapPhieuGiao')
                ->nullable()
                ->comment('Ngay lap phieu giao mac tinh la null');
            
            $table->dateTime('dh_ngayGiaoHang')
                ->nullable()
                ->comment('Ngay giao hang mac dinh la null');
            
            $table->timestamp('dh_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi');

            $table->timestamp('dh_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat');

            $table->unsignedTinyInteger('dh_trangThai')
                ->default(1)
                ->comment('Trang thai: 1-Khoa, 2-Kha dung');

            $table->unsignedTinyInteger('vc_ma')
                ->comment('Ma van chuyen');
            
            $table->unsignedTinyInteger('tt_ma')
                ->comment('Ma thanh toan');
            
            $table->foreign('kh_ma')
                ->references('kh_ma')
                ->on('khachhang')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('nv_xuLy')
                ->references('nv_ma')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('nv_giaoHang')
                ->references('nv_ma')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('vc_ma')
                ->references('vc_ma')
                ->on('vanchuyen')
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
        Schema::dropIfExists('donhang');
    }
}
