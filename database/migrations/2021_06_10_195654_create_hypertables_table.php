<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHypertablesTable extends Migration
{
    /**
     * Run the migrations.
     * This will create the hypertables table in your databse, this is a madetory table for hypertables to work
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hypertables', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('table_name', 100);
            $table->text('table_description');
            $table->string('table_column', 100);
            $table->string('table_column_type', 100);
            $table->string('hyper_table_name', 100);
            $table->string('hyper_column_name', 100);
            $table->string('hyper_column_type', 100);
            $table->string('hyper_column_icon', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hypertables');
    }
}
