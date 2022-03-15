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
        Schema::create('tvarkarastis', function (Blueprint $table) {
            $table->id();
            $table->integer('grupes_id');
            $table->integer('laikas_id');
            $table->integer('dienos_id');
            $table->integer('paskaitos_id');
            $table->integer('destytojai_id');
            $table->integer('patalpos_id');
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
        Schema::dropIfExists('tvarkarastis');
    }
};

