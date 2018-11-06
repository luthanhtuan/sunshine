<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonle', function (Blueprint $table) {

            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->bigIncrements('hdl_ma')
                ->comment('Ma hoa don le');
            
            $table->string('hdl_nguoiMuaHang', 100)
                ->comment('Nguoi mua hang');

            $table->string('hdl_dienThoai', 17)
                ->comment('So dien thoai nguoi mua hang');
            
            $table->string('hdl_diaChi')
                ->comment('Dia chi nguoi mua hang');

            $table->unsignedSmallInteger('nv_lapHoaDon')
                ->comment('Nguoi lap hoa don');

            $table->dateTime('hdl_ngayXuatHoaDon')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Ngay xuat hoa don');

            $table->unsignedBigInteger('dh_ma')
                ->default(1)
                ->comment('Ma don hang');

            $table->foreign('nv_lapHoaDon')
                ->references('nv_ma')
                ->on('nhanvien')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('dh_ma')
                ->references('dh_ma')
                ->on('donhang')
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
        Schema::dropIfExists('hoadonle');
    }
}
