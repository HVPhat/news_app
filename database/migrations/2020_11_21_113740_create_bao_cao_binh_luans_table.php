<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaoCaoBinhLuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bao_cao_binh_luans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nguoi_dung');
            $table->unsignedBigInteger('binh_luan');
            $table->text('trang_thai');
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bao_cao_binh_luans');
    }
}
