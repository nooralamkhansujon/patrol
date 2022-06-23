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
        Schema::create('check_points', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code_number');
            $table->foreignId('organization_id')
            ->constrained('organizations')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->text('description');
            $table->dateTime('creation_time');

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
        Schema::dropIfExists('check_points');
    }
};