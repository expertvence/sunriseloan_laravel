<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_no_fk');
            $table->integer('member_id_fk');
            $table->string('member_code_no')->nullable();
            $table->string('member_name')->nullable();
            $table->string('year');
            $table->bigInteger('amount');
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
        Schema::dropIfExists('extra_payments');
    }
}
