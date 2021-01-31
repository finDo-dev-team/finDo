<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('lead_text')->nullable();
            $table->text('description')->nullable();
            $table->dateTimeTz('date_start')->nullable();
            $table->dateTimeTz('date_end')->nullable();
            $table->text('address_name')->nullable();
            $table->text('address_city')->nullable();
            $table->text('address_zipcode')->nullable();
            $table->text('address_street')->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->string('checkSum')->nullable();
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
        Schema::dropIfExists('events');
    }
}
