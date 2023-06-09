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
        Schema::create('projects', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('company_reference');
            $table->timestamps();

            $table->foreign('company_reference')->references('id')->on('companies');
            $table->foreignId('client_id')
                ->nullable()
                ->constrained('clients')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('agent_id')
                ->nullable()
                ->constrained('client_representatives')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
