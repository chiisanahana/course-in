<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')
                ->onDelete('cascade');;
            $table->integer('promo_id')->default(0);
            $table->string('payment_method');
            $table->integer('amount');
            $table->float('ratings')->default(0.0);
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
        Schema::dropIfExists('payments');
    }
}
