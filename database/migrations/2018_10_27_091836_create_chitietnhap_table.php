<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietnhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietnhap', function (Blueprint $table) {

            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedBigInteger('pn_ma')
                ->comment('Ma phieu nhap');

            $table->unsignedBigInteger('sp_ma')
                ->comment('Ma san pham');

            $table->unsignedTinyInteger('m_ma')
                ->comment('Ma mau');

            $table->unsignedSmallInteger('ctn_soLuong')
                ->default(1)
                ->comment('So luong chi tiet nhap');
            
            $table->unsignedInteger('ctn_donGia')
                ->default(1)
                ->comment('Don gia chi tiet nhap');
            
            $table->primary(['pn_ma','sp_ma','m_ma']);

            $table->foreign('pn_ma')
                ->references('pn_ma')
                ->on('phieunhap')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('sp_ma')
                ->references('sp_ma')
                ->on('sanpham')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('m_ma')
                ->references('m_ma')
                ->on('mau')
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
        Schema::dropIfExists('chitietnhap');
    }
}
