<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMauSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_sanpham', function (Blueprint $table) {
            
            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedBigInteger('sp_ma')
                ->comment('Ma san pham');
            
            $table->unsignedTinyInteger('m_ma')
                ->comment('Ma mau');

            $table->unsignedSmallInteger('msp_soLuong')
                ->default(0)
                ->comment('So luong mau san pham');

            $table->primary(['sp_ma','m_ma']);
            
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
        Schema::dropIfExists('mau_sanpham');
    }
}
