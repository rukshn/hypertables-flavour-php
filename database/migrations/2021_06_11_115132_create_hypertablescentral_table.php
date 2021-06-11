<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHypertablescentralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ht_central', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('hyper_table_name', 255);
            $table->text('hyper_table_description')->nullable();
            $table->string('table_name', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ht_central');
    }
}
