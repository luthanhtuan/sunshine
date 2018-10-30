<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhtoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhtoan', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Ho tro Relationship
            $table->unsignedTinyInteger('tt_ma')
                ->autoIncrement()
                ->comment('Ma thanh toan');
            $table->string('tt_ten', 191)
                ->unique(['tt_ten'])
                ->comment('Ten thanh toan 191 ky tu');
            $table->text('tt_dienGiai')
                ->comment('Dien giai qua trinh thanh toan');
            $table->timestamp('tt_taoMoi')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem tao moi');
            $table->timestamp('tt_capNhat')
                ->default(DB::raw('CURRENT_TIMESTAMP'))
                ->comment('Thoi diem cap nhat');
            $table->unsignedTinyInteger('tt_trangThai')
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
        Schema::dropIfExists('thanhtoan');
    }
}
