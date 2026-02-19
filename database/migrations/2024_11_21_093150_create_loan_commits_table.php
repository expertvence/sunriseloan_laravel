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
            $table->id();  // auto-increment primary key
            $table->unsignedBigInteger('loan_payment_id');  // Foreign key referencing the loans table

            // Define the foreign key constraint to the loans table (loan_ide)
            $table->foreign('loan_payment_id')
                  ->references('loan_ide')->on('loans')  // Assuming 'loan_ide' is the unique identifier in the 'loans' table
                  ->onDelete('cascade');  // Automatically delete commits when the related loan is deleted

            // Add the loan_commit_id column for the unique ID like LCN001, LCN002, etc.
            $table->string('loan_commit_id')->unique();  // Store the auto-generated loan commit ID

            $table->decimal('payment_amount', 10, 2);
            $table->integer('loan_year');
           $table->string('payment_month');
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
