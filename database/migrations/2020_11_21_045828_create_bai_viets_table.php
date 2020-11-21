<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaiVietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_viets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('chu_de');
            $table->text('tieu_de');
            $table->string('hinh_anh',100);
            $table->text('noi_dung');
            $table->unsignedBigInteger('tac_gia');
            $table->unsignedBigInteger('nguoi_duyet');
            $table->boolean('da_duyet')->default(false);
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
        Schema::dropIfExists('bai_viets');
    }
}
