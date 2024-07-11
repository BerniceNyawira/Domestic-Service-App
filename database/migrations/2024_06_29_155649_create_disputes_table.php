<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_disputes_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisputesTable extends Migration
{
    public function up()
    {
        Schema::create('disputes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('role', ['employer', 'domesticworker']);
            $table->string('subject');
            $table->text('description');
            $table->enum('status', ['pending', 'resolved', 'rejected'])->default('pending');
            $table->timestamps();

            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('domestic_worker_id')->references('id')->on('domestic_workers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('disputes');
    }
}






