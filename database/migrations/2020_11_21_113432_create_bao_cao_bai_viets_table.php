<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaoCaoBaiVietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bao_cao_bai_viets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nguoi_dung');
            $table->unsignedBigInteger('bai_viet');
            $table->text('noi_dung');
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
        Schema::dropIfExists('bao_cao_bai_viets');
    }
}
