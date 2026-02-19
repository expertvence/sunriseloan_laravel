<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InstallmentPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installment_payment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_id');
            $table->string('invoice_code');
            $table->integer('member_id_fk');
            $table->string('member_code_no')->nullable();
            $table->string('member_name')->nullable();
            $table->string('from_month');
            $table->string('to_month')->nullable();
            $table->string('year');
            $table->integer('no_of_share');
            $table->integer('share_amount');
            $table->boolean('is_publish')->default(0);
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
        Schema::dropIfExists('installment_payment');
    }
}
