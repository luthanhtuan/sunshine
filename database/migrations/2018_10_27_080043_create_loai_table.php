<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai', function (Blueprint $table) {

            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedTinyInteger('l_ma')
                ->autoIncrement()
                ->comment('Ma loai');

            $table->string('l_ten', 50)
                ->unique()
                ->comment('Ten loai 50 ky tu');

            $table->timestamp('l_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi');

            $table->timestamp('l_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat');

            $table->unsignedTinyInteger('l_trangThai')
                ->default(2)
                ->comment('Trang thai: 1-Khoa, 2-Kha dung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai');
    }
}
