<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company')->nullable();
            $table->string('manager')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('doc_number')->nullable();
            $table->string('email')->nullable();
            $table->integer('timbrado')->nullable();
            $table->string('start_date_timbrado')->nullable();
            $table->string('end_date_timbrado')->nullable();
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
        Schema::dropIfExists('providers');
    }
}
