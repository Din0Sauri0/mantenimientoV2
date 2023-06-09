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
        Schema::create('client_representatives', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('number');
            $table->string('email');
            $table->timestamps();

            $table->unsignedBigInteger('company_reference');

            $table->foreign('company_reference')->references('id')->on('companies');

            $table->foreignId('client_id')
                ->nullable()
                ->constrained('clients')
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
        //
    }
};
