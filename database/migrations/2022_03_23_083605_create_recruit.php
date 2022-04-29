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
        Schema::create('recruit', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('expiration_date');
            $table->integer('type_work');
            $table->integer('education_level');
            $table->integer('exp');
            $table->integer('salary');
            $table->longText('content_work')->nullable();
            $table->longText('regime_work')->nullable();
            $table->longText('profile_work')->nullable();
            $table->longText('contact_work')->nullable();
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
        Schema::dropIfExists('recruit');
    }
};
