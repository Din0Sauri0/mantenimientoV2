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
        Schema::create('clients', function(Blueprint $table){
            $table->id();
            $table->string('company_name');
            $table->string('address');
            $table->string('giro');
            $table->string('contact_name');
            $table->string('contact_last_name');
            $table->string('contact_number');
            $table->string('email');
            $table->timestamps();
            //foreign atribute
            $table->unsignedBigInteger('company_reference');
            //foreign key
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
        Schema::dropIfExists('clients');
    }
};
