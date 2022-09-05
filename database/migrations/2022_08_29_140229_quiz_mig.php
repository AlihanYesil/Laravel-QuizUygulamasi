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
        Schema::create('quizler', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->LongText('description')->nullable();
            $table->string('slug');
            $table->timestamp('finished_at')->nullable();
            $table->enum('status', ['active', 'passive', 'draft'])->default('draft');
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
        Schema::dropIfExists('quizler');
    }
};
