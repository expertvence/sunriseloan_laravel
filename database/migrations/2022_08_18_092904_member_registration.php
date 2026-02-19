<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MemberRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('Uid');
            $table->string('name');
            $table->text('fathers_mane');
            $table->text('mothers_mane');
            $table->text('mobile');
            $table->text('age');
            $table->text('address');
            $table->text('religion');
            $table->text('gender');
            $table->enum('user_type', ['user', 'employee'])->default('user');
            $table->text('email');
            $table->boolean('is_publish')->default(0);
            $table->integer('no_of_share')->nullable();
            $table->integer('share_amount')->nullable();          
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
       
        Schema::dropIfExists('members');
    }
}
