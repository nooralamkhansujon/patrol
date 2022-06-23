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
        Schema::create('device_routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')
            ->constrained('devices')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('route_id')
            ->constrained('routes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('device_routes');
    }
};
