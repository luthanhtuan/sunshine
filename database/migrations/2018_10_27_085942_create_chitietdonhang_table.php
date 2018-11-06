<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {

            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedBigInteger('dh_ma')
                ->comment('Ma don hang');

            $table->unsignedBigInteger('sp_ma')
                ->comment('Ma san pham');

            $table->unsignedTinyInteger('m_ma')
                ->comment('Ma mau');

            $table->unsignedSmallInteger('ctdh_soLuong')
                ->default(1)
                ->comment('So luong');

            $table->unsignedInteger('ctdh_donGia')
                ->default(1)
                ->comment('Don gia');

            $table->primary(['dh_ma','sp_ma','m_ma']);

            $table->foreign('dh_ma')
                ->references('dh_ma')
                ->on('donhang')
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
        Schema::dropIfExists('chitietdonhang');
    }
}
