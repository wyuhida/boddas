<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('content_name')->nullable();
            $table
                ->bigInteger('id_container')
                ->unsigned()
                ->nullable();
            $table
                ->bigInteger('id_content_status')
                ->unsigned()
                ->nullable();
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
            $table
                ->foreign('id_container')
                ->references('id')
                ->on('containers')
                ->onDelete('cascade');
            $table
                ->foreign('id_content_status')
                ->references('id')
                ->on('content__statuses')
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
        Schema::dropIfExists('contents');
    }
}
