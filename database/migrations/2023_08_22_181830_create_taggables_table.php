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
        return;
        // Schema::create('taggables', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('tag_id');
        //     $table->morphs('taggable');
        //     $table->timestamps();

        //     $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taggables');
    }
};
