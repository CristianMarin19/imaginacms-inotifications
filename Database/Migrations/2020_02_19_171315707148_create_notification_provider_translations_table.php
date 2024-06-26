<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('notification__provider_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->string('description')->nullable();

            $table->integer('provider_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['provider_id', 'locale']);
            $table->foreign('provider_id')->references('id')->on('notification__providers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('notification__provider_translations', function (Blueprint $table) {
            $table->dropForeign(['provider_id']);
        });
        Schema::dropIfExists('notification__provider_translations');
    }
};
