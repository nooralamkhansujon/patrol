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
        Schema::create('checkpoint_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checkpoint_id')->constrained('check_points')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('device_id')->constrained('devices')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('patrolman_id')->nullable()->constrained('patrol_mens')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('create_time');

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
        Schema::dropIfExists('checkpoint_logs');
    }
};