<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cic', function (Blueprint $table) {
            $table->id();
            $table->foreign('id')->references('id')->on('account');
            $table->string('tieude');
            $table->string('loaihinh');
            $table->string('noidung');
            $table->string('tencongty')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('diachi');
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
        Schema::dropIfExists('cic');
    }
};
