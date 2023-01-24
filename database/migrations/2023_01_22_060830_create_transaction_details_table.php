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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->integer("quantity");
            $table->unsignedBigInteger("transaction_id");
            $table->unsignedBigInteger("food_id");
            $table->integer("price");
            $table->foreign("food_id")->references("id")->on("foods");
            $table->foreign("transaction_id")->references("id")->on("transactions");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
