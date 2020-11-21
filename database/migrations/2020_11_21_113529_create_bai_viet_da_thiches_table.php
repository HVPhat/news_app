<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaiVietDaThichesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bai_viet_da_thiches', function (Blueprint $table) {
            $table->unsignedBigInteger('nguoi_dung');
            $table->unsignedBigInteger('bai_viet');
            $table->softDeletes(); 
            $table->timestamps();
            $table->primary(['nguoi_dung', 'bai_viet' ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bai_viet_da_thiches');
    }
}
