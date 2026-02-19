<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomeExpenseTableNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income_expense', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->decimal('income_expence', 20, 2)->nullable();
            $table->string('type')->nullable();
            $table->integer('entry_by')->unsigned()->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('income_expense');
    }
}
