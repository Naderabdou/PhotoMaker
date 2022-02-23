<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('type');
            $table->string('phone');
            $table->string('email');
            $table->string('file')->nullable();
            $table->string('other')->nullable();
            $table->integer('photo')->nullable();
            $table->enum('status',['active','unactive'])->default('unactive');

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
        Schema::dropIfExists('contacts');
    }
}
