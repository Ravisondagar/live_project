<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_educations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->text('degree')->nullable();
            $table->text('university')->nullable();
            $table->text('specialisation')->nullable();
            $table->string('passing_year')->nullable();
            $table->string('percentage')->nullable();
            $table->text('achievements')->nullable();
            $table->softDeletes();
            $table->index(['deleted_at']);
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
        Schema::dropIfExists('_user_educations');
    }
}
