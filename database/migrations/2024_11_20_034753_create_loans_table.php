<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id('loan_ide');  
            $table->unsignedBigInteger('user_id');
            $table->integer('member_id');
            $table->string('created_by');
            $table->string('l_uId')->unique();
            $table->enum('status',['pending','complete','rejected'])->default('pending') ;
            $table->decimal('loan_amount', 15, 2); 
            $table->string('loan_category_id');
            $table->text('loan_purpose');  
            $table->integer('creator_id');  
            $table->string('loan_term');
            $table->string('repayment_type');   
            $table->string('monthly_duration')->nullable();  
            $table->string('weekly_duration')->nullable();
            $table->integer('payment_schedule');  
            $table->float('deposit')->nullable();  
            $table->decimal('monthly_income', 15, 2); 
            $table->string('other_documents')->nullable();  
            $table->timestamps();

            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
