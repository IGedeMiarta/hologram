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
            $table->id();
            $table->unsignedBigInteger('client');
            $table->string('trx');
            $table->date('due_date');
            $table->string('desain_front')->nullable();
            $table->string('desain_back')->nullable();
            $table->text('notes');
            $table->float('dp_amount',15,2);
            $table->float('total',15,2);
            $table->string('charge_name');
            $table->integer('charge_percent');
            $table->integer('charge_amount');
            $table->string('disc_name');
            $table->integer('disc_percent');
            $table->integer('disc_amount');
            $table->float('fin_amount',15,2);
            $table->integer('status');
            $table->unsignedBigInteger('cashier_id');
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
