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
        Schema::create('profile_actions', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id');
            $table->integer('action_id');
            $table->timestamps();

            $table->foreign('profile_id')->on('profiles')->references('id');
            $table->foreign('action_id')->on('actions')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_actions');
    }
};
