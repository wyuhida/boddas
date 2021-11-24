<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content__statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status_name')->nullable();
            $table
                ->bigInteger('id_user')
                ->unsigned()
                ->nullable();
            $table->unsignedBigInteger('update_by')->nullable();
            $table->timestamps();

            $table
                ->foreign('id_user')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('content__statuses');
    }
}
