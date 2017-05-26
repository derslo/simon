<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fqdn')->nullable();
            $table->string('name');
            $table->ipAddress('ipV4')->nullable();
            $table->ipAddress('ipV6')->nullable();
            $table->boolean('public')->default(true);
            $table->integer('location_id')->nullable();
            $table->text('description')->nullable();
            $table->integer('contact_id')->nullable();
            $table->integer('os_id')->nullable();
            $table->boolean('virtual')->nullable();
            $table->mediumInteger('ram')->nullable();
            $table->tinyInteger('cores')->nullable();
            $table->integer('storage_id')->nullable();
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
        Schema::dropIfExists('servers');
    }
}
