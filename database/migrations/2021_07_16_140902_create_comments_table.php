<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')
                ->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('tip_id')->nullable();
            $table->foreign('tip_id')->references('id')
                ->on('tips')->onDelete('cascade');

            $table->unsignedBigInteger('sample_id')->nullable();
            $table->foreign('sample_id')->references('id')
                ->on('samples')->onDelete('cascade');

            $table->unsignedBigInteger('creatives_id')->nullable();
            $table->foreign('creatives_id')->references('id')
                ->on('creatives')->onDelete('cascade');

            $table->string('user_name');
            $table->string('email');
            $table->text('description');
            $table->tinyInteger('approved')->default(0);
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
        //
    }
}
