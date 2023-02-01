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
        Schema::create('workers', function(Blueprint $table){
            $table->id();
            $table->string('last_name');
            $table->boolean('admin')->default(false);
            $table->timestamps();
            $table->unsignedBigInteger('user_reference');
            $table->unsignedBigInteger('company_reference');
            
            $table->foreign('user_reference')->references('id')->on('users');
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
        Schema::dropIfExists('workers');
    }
};
