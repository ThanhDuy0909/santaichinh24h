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
        Schema::create('recruit_province', function (Blueprint $table) {
            $table->id();
            $table->integer('province_id');
            $table->integer('recruit_id');
            $table->integer('active')->default(1)->comment('1: hiện , 0 : ẩn');
            $table->integer('delete')->default(1)->comment('1: ko , 0 : xoá');
            $table->integer('created_at')->default(time());
            $table->integer('updated_at')->default(time());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruit_province');
    }
};
