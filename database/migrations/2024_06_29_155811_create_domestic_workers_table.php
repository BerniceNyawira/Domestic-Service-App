<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_domestic_workers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomesticWorkersTable extends Migration
{
    public function up()
    {
        Schema::create('domestic_workers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->date('date_of_birth');
            $table->string('skills');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('address');
            $table->string('telephone');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('domestic_workers');
    }
}

