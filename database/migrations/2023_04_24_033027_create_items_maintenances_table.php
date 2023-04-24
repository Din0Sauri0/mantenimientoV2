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
        Schema::create('items_maintenances', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('item_id')
                ->nullable()
                ->constrained('items')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('maintenance_id')
                ->nullable()
                ->constrained('maintenances')
                ->cascadeOnUpdate()
                ->nullaOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_maintenances');
    }
};
