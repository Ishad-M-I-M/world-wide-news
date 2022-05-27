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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('headline');
            $table->string('img_path');
            $table->text('report');
            $table->integer('reporter_id')->references('id')->on('users');
            $table->enum('category', ['world', 'local', 'sports']);
            $table->unsignedTinyInteger('status');
            $table->timestamp('reported_at');
            $table->timestamp('published at');
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
        Schema::dropIfExists('articles');
    }
};
