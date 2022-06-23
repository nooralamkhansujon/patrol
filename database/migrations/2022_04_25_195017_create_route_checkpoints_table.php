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
        Schema::create('route_checkpoints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checkpoint_id')
                ->constrained('check_points')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('route_id')
                ->constrained('routes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->time('interval')->default(0);
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
        Schema::dropIfExists('route_checkpoints');
    }
};
