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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content_short')->nullable();
            $table->longText('content')->nullable();
            $table->string('filename')->nullable();
            $table->string('hash')->nullable();
            $table->string('ext')->nullable();
            $table->string('create_by_id')->nullable();
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
        Schema::dropIfExists('news');
    }
};
