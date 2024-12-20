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
        Schema::create('quotes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('author_id')->nullable();
            $table->text('words');
            $table->string('tags')->nullable();
            $table->string('slug');
            $table->integer('status')->default(0);
            $table->dateTime('posted_at')->nullable();
            $table->timestamps();

            // $table->index(['words', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
};
