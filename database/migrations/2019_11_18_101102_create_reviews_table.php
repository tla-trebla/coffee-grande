<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->decimal('rating', 1, 0)->nullable();
            $table->text('comment')->nullable();
            $table->tinyInteger('spam')->unsigned()->default('0');
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
        Schema::dropIfExists('reviews');
    }
}
