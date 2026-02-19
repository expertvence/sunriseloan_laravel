<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentLateFinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installment_late_fines', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id_fk')->nullable();
            $table->integer('user_id_fk')->nullable();
            $table->string('from_month')->nullable();
            $table->string('year')->nullable();
            $table->decimal('share_amount',10,2)->nullable();
            $table->decimal('total_amount',10,2)->nullable();
            $table->decimal('fine_percent',10,2)->nullable();
            $table->decimal('fine_amount',10,2)->nullable();
            $table->tinyInteger('payment_ind')->default(0);
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
        Schema::dropIfExists('installment_late_fines');
    }
}
