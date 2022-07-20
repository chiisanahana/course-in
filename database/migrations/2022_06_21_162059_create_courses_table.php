<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id')->default(1);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('wa_number');
            $table->longText('address');
            $table->string('card_number')->nullable();
            $table->boolean('active')->default(1);  // status sedang libur atau engga
            $table->rememberToken();
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
        Schema::dropIfExists('courses');
    }
}
