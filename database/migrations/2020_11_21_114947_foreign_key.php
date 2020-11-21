<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::table('bai_viets', function (Blueprint $table) {

            $table->foreign('tac_gia')->references('id')->on('users');
            
        });
        Schema::table('binh_luans', function (Blueprint $table) {

            $table->foreign('nguoi_dang')->references('id')->on('users');

        });
        Schema::table('bai_viets', function (Blueprint $table) {

            $table->foreign('chu_de')->references('id')->on('chu_des');
            
        }); 
        Schema::table('binh_luans', function (Blueprint $table) {

            $table->foreign('thuoc_ve_bai_viet')->references('id')->on('bai_viets');
            
        });
        Schema::table('bai_viet_da_thiches', function (Blueprint $table) {

            $table->foreign('bai_viet')->references('id')->on('bai_viets');
            
        });
        Schema::table('bai_viet_da_thiches', function (Blueprint $table) {

            $table->foreign('nguoi_dung')->references('id')->on('users');
            
        });
        Schema::table('bao_cao_bai_viets', function (Blueprint $table) {

            $table->foreign('bai_viet')->references('id')->on('bai_viets');
            
        });
        Schema::table('bao_cao_bai_viets', function (Blueprint $table) {

            $table->foreign('nguoi_dung')->references('id')->on('users');
            
        });
        Schema::table('bai_viet_da_luus', function (Blueprint $table) {

            $table->foreign('bai_viet')->references('id')->on('bai_viets');
            
        });
        Schema::table('bai_viet_da_luus', function (Blueprint $table) {

            $table->foreign('nguoi_dung')->references('id')->on('users');
            
        });
        Schema::table('bao_cao_binh_luans', function (Blueprint $table) {

            $table->foreign('nguoi_dung')->references('id')->on('users');
            
        });
        Schema::table('bao_cao_binh_luans', function (Blueprint $table) {

            $table->foreign('binh_luan')->references('id')->on('binh_luans');
            
        });
        
        Schema::table('bai_viets', function(Blueprint $table){
            $table->foreign('nguoi_duyet')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
