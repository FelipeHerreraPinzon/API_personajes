<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Personajes extends Migration{
    
    public function up(){
        Schema::create('personajes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('profesion');
            $table->string('imagen');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('personajes');
    }
}