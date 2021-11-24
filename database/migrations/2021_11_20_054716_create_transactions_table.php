<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table
                ->bigInteger('id_user')
                ->unsigned()
                ->nullable();
            $table
                ->bigInteger('id_transaction_status')
                ->unsigned()
                ->nullable();
            $table->decimal('total_price')->nullable();
            $table->unsignedBigInteger('update_by')->nullable();

            $table->timestamps();
            $table
                ->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table
                ->foreign('id_transaction_status')
                ->references('id')
                ->on('transaction__statuses')
                ->onDelete('cascade');
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
}
