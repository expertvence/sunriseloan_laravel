<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan_commits', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->after('payment_month');
            $table->float('savings')->after('status')->default(0);
            $table->float('total_savings')->after('savings');
            $table->integer('manager_id')->after('total_savings')->nullable();
            $table->string('emp_name')->after('emp_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loan_commits', function (Blueprint $table) {
            //
        });
    }
};
