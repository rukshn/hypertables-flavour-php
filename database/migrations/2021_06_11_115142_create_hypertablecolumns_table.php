<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHypertablecolumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hypertablecolumns', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('table_id');
            $table->string('hyper_column_name', 255);
            $table->string('hyper_column_type', 255);
            $table->string('hyper_column_icon', 255);
            $table->string('table_column_name', 255);
            $table->json('hyper_column_default_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hypertablecolumns');
    }
}
