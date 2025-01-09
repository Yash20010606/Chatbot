<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentSkillTable extends Migration
{
    public function up()
    {
        Schema::create('agent_skill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id');
            $table->string('emp_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agent_skill');
    }
}
