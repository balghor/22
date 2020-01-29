<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->text("project_name");
            $table->integer("cp_id");
            $table->dateTime("start_date");
            $table->dateTime("end_date");
            $table->longText("album");
            $table->longText("description");
            $table->longText("detail")->nullable();
            $table->integer("user_id");
            $table->string("physical_progress");
            $table->text("cost");
            $table->integer("active")->default("1");
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
        Schema::dropIfExists('projects');
    }
}
