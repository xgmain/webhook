<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message_id')->index();
            $table->nullableMorphs('receiver');
            $table->string('address')->nullable();
            $table->string('subject')->nullable();
            $table->text('body')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->dateTime('failed_at')->nullable();
            $table->dateTime('opened_at')->nullable();
            $table->dateTime('clicked_at')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
