<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanchuyen', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Ho tro Relationship
            $table->unsignedTinyInteger('vc_ma')
                ->autoIncrement()
                ->comment('Ma van chuyen');
            $table->string('vc_ten', 191)
                ->unique(['vc_ten'])
                ->comment('Ten van chuyen 191 ky tu');
            $table->unsignedInteger('vc_chiPhi')
                ->default('0')
                ->comment('Chi phi van chuyen: Mac dinh 0');
            $table->text('vc_dienGiai')
                ->comment('Dien giai qua trinh van chuyen');
            $table->timestamp('vc_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi');
            $table->timestamp('vc_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat');
            $table->unsignedTinyInteger('vc_trangThai')
                ->default('2')
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
        Schema::dropIfExists('vanchuyen');
    }
}
