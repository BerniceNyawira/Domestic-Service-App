<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_requests_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('domestic_worker_id');
            $table->enum('status', ['pending', 'approved', 'declined'])->default('pending');
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('domestic_worker_id')->references('id')->on('domestic_workers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('requests');
    }
}



