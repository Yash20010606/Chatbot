<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorTable extends Migration
{
    public function up()
    {
        Schema::create('supervisor', function (Blueprint $table) {
            $table->string('emp_id')->primary();
            $table->string('group_code')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('supervisor');
    }
}
