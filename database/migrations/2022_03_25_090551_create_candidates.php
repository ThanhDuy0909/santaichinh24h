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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('full_nameCandidates');
            $table->string('imgname')->nullable();
            $table->string('imghash')->nullable();
            $table->string('imgext')->nullable();
            $table->string('filename')->nullable();
            $table->string('filehash')->nullable();
            $table->string('fileext')->nullable();
            $table->integer('gender_candidates')->comment('1 : nam , 2 : nữ ,3 : khác');
            $table->integer('marital_candidates')->comment('1 : Độc thân , 2 : kết hôn ');
            $table->string('birthday_candidates');
            $table->string('phone_candidates');
            $table->string('email_candidates');
            $table->string('address_candidates');
            $table->string('school_candidates');
            $table->integer('education_level');
            $table->string('graduate_candidates');
            $table->string('otherDegrees_candidates')->nullable();
            $table->longText('achievements_candidates')->nullable();
            $table->string('workExperience_candidates')->comment('1 : chưa có , 0 : có ');
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
        Schema::dropIfExists('candidates');
    }
};
