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
            $table->string('image');
            $table->text('report');
            $table->integer('reporter_id')->references('id')->on('users');
            $table->enum('category', ['Politics', 'Sports', 'Entertainment', 'Business']);
            $table->enum('status', ['Approved', 'Pending', 'Rejected'])->default('Pending');
            $table->timestamp('reported_at')->useCurrent();
            $table->timestamp('published at')->nullable();
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
