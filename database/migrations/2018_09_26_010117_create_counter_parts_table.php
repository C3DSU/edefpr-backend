<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounterPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counter_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('rg')->nullable();
            $table->string('rg_issuer')->nullable();
            $table->string('phone_number')->nullable();
            $table->decimal('remuneration', 11, 2)->nullable();
            $table->string('profession')->nullable();
            $table->text('note')->nullable();
            $table->enum('document_type', ['CPF', 'CNPJ']);
            $table->string('document_number', 18)->unique();
            $table->string('uf', 2);
            $table->string('city');
            $table->string('number');
            $table->string('street');
            $table->string('postcode');
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
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
        Schema::dropIfExists('counter_parts');
    }
}
