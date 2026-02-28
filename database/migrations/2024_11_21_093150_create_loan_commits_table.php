<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanCommitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_commits', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('loan_payment_id');   
            $table->foreign('loan_payment_id')
                ->references('loan_ide')->on('loans')  
                ->onDelete('cascade'); 
            $table->string('loan_commit_id')->unique(); 
            $table->string('emp_id')->nullable();
            $table->decimal('payment_amount', 10, 2);
            $table->float('without_deposit')->default(0.0);
            $table->integer('loan_year');
            $table->string('payment_month');
            $table->integer('committed_user_id');
            $table->string('committed_user_name');
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
        Schema::dropIfExists('loan_commits');
    }
}
