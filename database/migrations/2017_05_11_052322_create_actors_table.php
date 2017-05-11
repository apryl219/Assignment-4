<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
       Schema::create('actors', function (Blueprint $table) {

           $table->increments('id');
           $table->timestamps();

           $table->string('first_name');
           $table->string('last_name');
           $table->integer('birth_year');
           $table->string('bio_url');

       });
   }

   public function down()
   {
       Schema::drop('actors');
   }
}
