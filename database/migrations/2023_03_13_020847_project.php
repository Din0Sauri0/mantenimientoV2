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
            $table->unsignedBigInteger('client_reference');
            $table->unsignedBigInteger('client_representative');

            $table->foreign('company_reference')->references('id')->on('companies');
            $table->foreign('client_reference')->references('id')->on('clients');
            $table->foreign('client_representative')->references('id')->on('client_representatives');
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
