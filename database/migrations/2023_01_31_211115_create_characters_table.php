<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('characters', function(Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->integer('level');
            $table->string('gender');
            $table->integer('age');
            $table->integer('height');
            $table->foreignId('profile_id')->constrained();
            $table->foreignId('advantage_id')->constrained();
            $table->foreignId('family_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
