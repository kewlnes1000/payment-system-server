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
            $table->string('paytype')->nullable();
            $table->string('orderno')->unique();
            $table->string('gametype')->nullable();
            $table->string('gameid')->unique();
            $table->string('gamename')->nullable();
            $table->string('ip')->nullable();
            $table->string('amount');
            $table->decimal('rate', 5, 2)->nullable();
            $table->boolean('donepay')->default(0);
            $table->dateTime('donetime')->nullable();
            $table->string('status')->default('working');
            $table->string('handlingfee')->nullable();
            $table->string('remark')->nullable();
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
