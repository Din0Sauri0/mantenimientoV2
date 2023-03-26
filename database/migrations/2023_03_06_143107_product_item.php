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
        Schema::create('product_items', function(Blueprint $table){
            $table->id();
            $table->string('serial_number');
            $table->unsignedBigInteger('company_reference');
            $table->timestamps();
    
            $table->foreign('company_reference')->references('id')->on('companies');
            //$table->foreign('model')->references('model')->on('products')->onDelete('cascade');
            $table->foreignId('product_id')
                ->nullable()
                ->constrained('products')
                ->cascadeOnUPdate()
                ->nullOnDelete();
    
            $table->foreignId('project_id')
                ->nullable()
                ->constrained('projects')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_items');
    }
};
