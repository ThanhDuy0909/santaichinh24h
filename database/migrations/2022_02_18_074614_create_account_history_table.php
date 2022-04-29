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
        Schema::create('account_history', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->string('id_account');
            $table->integer('status')->comment('0 : Đăng xuất , 1 : Đăng nhập');
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
        Schema::dropIfExists('account_history');
    }
};
