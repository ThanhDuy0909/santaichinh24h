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
        Schema::create('candidates_work', function (Blueprint $table) {
            $table->id();
            $table->integer('candidates_id');
            $table->string('title_work');
            $table->string('ranks_work');
            $table->string('company_work');
            $table->string('form_work');
            $table->string('to_work');
            $table->string('content_work');
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
        Schema::dropIfExists('candidates_work');
    }
};
