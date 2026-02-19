<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MemberRegistrationNullChange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('members', function (Blueprint $table) {
          
            $table->string('name')->nullable();
            $table->text('fathers_mane')->nullable();
            $table->text('mothers_mane')->nullable();
            $table->text('mobile')->nullable();
            $table->text('age')->nullable();
            $table->text('address')->nullable();
            $table->text('religion')->nullable();
            $table->text('gender')->nullable();
            $table->text('email')->nullable();
            $table->integer('no_of_share')->nullable();
            $table->integer('share_amount')->nullable()->change();          
          

        });
    }
}
