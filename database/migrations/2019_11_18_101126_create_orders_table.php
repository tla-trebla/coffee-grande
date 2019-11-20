<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('order_number')->default('OR-########');
            $table->enum('status',
                ['not paid', 'being processed', 'ready to take', 'sending', 'done', 'canceled']);
            $table->string('name');
            $table->string('address')->nullable();
            $table->integer('phone');
            $table->enum('delivery_method', ['take away', 'GOFOOD']);
            $table->double('delivery_cost', 20, 2)->default('0.0');
            $table->double('discount', 20, 2)->default('0.0');
            $table->double('sub_total', 20, 2);
            $table->double('total', 20, 2);
            $table->text('note', 500)->nullable();
            $table->datetime('expired_date');
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
        Schema::dropIfExists('orders');
    }
}
