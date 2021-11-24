<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name')->nullable();
            $table->string('detail_product')->nullable();
            $table->decimal('price')->nullable();
            $table->unsignedBigInteger('total_sold')->nullable();
            $table->boolean('status_item')->default(true);
            $table->unsignedBigInteger('total_stock')->nullable();
            $table->unsignedBigInteger('update_by')->nullable();
            $table->unsignedBigInteger('id_category_item')->nullable();
            $table->timestamps();
            $table
                ->foreign('id_category_item')
                ->references('id')
                ->on('category__items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
