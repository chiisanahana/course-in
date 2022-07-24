<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('course_id')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('lesson_name', 255);
            $table->string('lesson_teacher', 255);
            $table->longText('description');
            $table->integer('price');
            $table->float('rating', 3, 1)->default(0.0);
            $table->string('image');
            $table->string('type', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
