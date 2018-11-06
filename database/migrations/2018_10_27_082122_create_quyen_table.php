<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyen', function (Blueprint $table) {

            $table->engine = 'InnoDB'; // Ho tro Relationship

            $table->unsignedTinyInteger('q_ma')
                ->autoIncrement()
                ->comment('Ma quyen: 1-Giam doc, 2-Quan tri, 3-Quan ly kho, 4-Ke toan, 5-Nhan vien ban hang, 6-Nhan vien giao hang');

            $table->string('q_ten', 30)
                ->unique()
                ->comment('Ten quyen 30 ky tu');

            $table->string('q_dienGiai')
                ->default('')
                ->nullable();

            $table->timestamp('q_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi');

            $table->timestamp('q_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat');

            $table->unsignedTinyInteger('q_trangThai')
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
        Schema::dropIfExists('quyen');
    }
}
