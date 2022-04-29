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
        Schema::create('account', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('facebook_id')->nullable();
            $table->string('ma_cic')->nullable();
            $table->bigInteger('gender')->unsigned()->nullable();
            // $table->foreign('gender')->references('id')->on('genders');
            $table->string('phone',11)->nullable();
            $table->string('email_account')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->integer('is_author')->comment('0 : phân quyền , 1 : Quản trị tối cao')->nullable();
            $table->integer('is_role')->comment('phần quyền')->nullable();
            $table->integer('is_active')->comment('0 : khóa , 1 : kích hoạt')->nullable();
            $table->integer('is_delete')->comment('1 : chưa , 0 : đã xóa')->nullable();
            $table->string('tengoicheck')->nullable();
            $table->integer('soluotcheck')->nullable();
            $table->date('ngaykichhoat')->nullable();
            $table->date('ngayhethan')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('account');
    }
};
