<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class createOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('book_id')->references('id')->on('books');

            $table->string('customer_name')->nullable();
            $table->string('customer_number')->nullable();
            $table->string('customer_address')->nullable();
            $table->decimal('unit_price')->nullable();
            $table->decimal('total')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('invoice_date')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
