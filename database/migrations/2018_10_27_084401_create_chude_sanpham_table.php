<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChudeSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chude_sanpham', function (Blueprint $table) {
            
            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedBigInteger('sp_ma')
                ->comment('Ma san pham');

            $table->unsignedTinyInteger('cd_ma')
                ->comment('Ma chu de');
            
            $table->primary(['sp_ma','cd_ma']);

            $table->foreign('sp_ma')
                ->references('sp_ma')
                ->on('sanpham')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('cd_ma')
                ->references('cd_ma')
                ->on('chude')
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
        Schema::dropIfExists('chude_sanpham');
    }
}
