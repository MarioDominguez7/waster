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
        Schema::create('actuators', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("type");
            $table->decimal("value", 10, 2);
            $table->dateTime("date");
            $table->integer("user_id")->unsigned();
            $table->string("status");
            $table->integer("value_status");
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
        Schema::dropIfExists('actuators');
    }
};
