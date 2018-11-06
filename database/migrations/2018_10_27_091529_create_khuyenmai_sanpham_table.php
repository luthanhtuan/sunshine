<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhuyenmaiSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyenmai_sanpham', function (Blueprint $table) {

            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedBigInteger('km_ma')
                ->comment('Ma khuyen mai');

            $table->unsignedBigInteger('sp_ma')
                ->comment('Ma san pham');

            $table->unsignedTinyInteger('m_ma')
                ->comment('Ma mau');

            $table->string('kmsp_giaTri', 50)
                ->default('100;0')
                ->comment('Gia tri san pham khuyen mai');

            $table->unsignedTinyInteger('kmsp_trangThai')
                ->default(2)
                ->comment('Trang thai: 1-Khoa, 2-Kha dung');

            $table->primary(['km_ma','sp_ma','m_ma']);

            $table->foreign('km_ma')
                ->references('km_ma')
                ->on('khuyenmai')
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
        Schema::dropIfExists('khuyenmai_sanpham');
    }
}
