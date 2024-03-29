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
        Schema::create('products', function(Blueprint $table){
            $table->id();
            $table->string('model');//modelo
            $table->string('name');
            $table->string('brand');
            $table->string('part_number');
            $table->string('img');
            $table->string('specification');
            $table->timestamps();

            $table->unsignedBigInteger('company_reference');
            $table->foreign('company_reference')->references('id')->on('companies');
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
        Schema::dropIfExists('products');
    }
};
