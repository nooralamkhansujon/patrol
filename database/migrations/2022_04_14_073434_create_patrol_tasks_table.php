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
        Schema::create('patrol_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('route_id')
            ->constrained('routes')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->bigInteger('start_date');
            $table->bigInteger('end_date')->nullable();//if null then means unlimited
            $table->tinyInteger('building')->default(0);
            $table->enum('type',[0,1,2,3]);
            $table->integer('cycle')->nullable();
            $table->boolean('fri')->default(false);
            $table->boolean('sat')->default(false);
            $table->boolean('sun')->default(false);
            $table->boolean('mon')->default(false);
            $table->boolean('tue')->default(false);
            $table->boolean('wed')->default(false);
            $table->boolean('thu')->default(false);
            $table->string('reCreate')->nullable();
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
        Schema::dropIfExists('patrol_tasks');
    }
};
