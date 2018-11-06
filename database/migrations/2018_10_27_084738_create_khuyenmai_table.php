<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenmai', function (Blueprint $table) {
            
            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedBigInteger('km_ma')
                ->autoIncrement()
                ->comment('Ma khuyen mai');
            
            $table->string('km_ten')
                ->comment('Ten khuyen mai 191 ky tu');

            $table->text('km_noiDung')
                ->comment('Noi dung khuyen mai');

            $table->dateTime('km_batDau')
                ->comment('Thoi gian bat dau khuyen mai');

            $table->dateTime('km_ketThuc')
                ->nullable()
                ->comment('Thoi gian ket thuc khuyen mai');

            $table->string('km_giaTri', 50)
                ->default('100;100')
                ->comment('Gia tri khuyen mai 50 ky tu');
            
            $table->unsignedSmallInteger('nv_nguoiLap')
                ->comment('Ma nhan vien lap khuyen mai');

            $table->dateTime('km_ngayLap')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Ngay lap khuyen mai');
            
            $table->unsignedSmallInteger('nv_kyNhay')
                ->default(1)
                ->comment('Ma nhan vien ky nhay');

            $table->dateTime('km_ngayKyNhay')
                ->nullable()
                ->comment('Ngay khuyen mai duoc ky nhay');

            $table->unsignedSmallInteger('nv_kyDuyet')
                ->default(1)
                ->comment('Ma nhan vien ky duyet');

            $table->dateTime('km_ngayDuyet')
                ->nullable()
                ->comment('Ngay ky duyet');

            $table->timestamp('km_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi');

            $table->timestamp('km_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat');
                
            $table->unsignedTinyInteger('km_trangThai')
                ->default(2)
                ->comment('Trang thai: 1-Khoa, 2-Kha dung');

            $table->foreign('nv_nguoiLap')
                ->references('nv_ma')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('nv_kyNhay')
                ->references('nv_ma')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('nv_kyDuyet')
                ->references('nv_ma')
                ->on('nhanvien')
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
        Schema::dropIfExists('khuyenmai');
    }
}
