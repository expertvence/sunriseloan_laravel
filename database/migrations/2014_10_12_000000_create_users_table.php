<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('ref_id')->nullable();
            $table->integer('update_ref_id')->nullable();
             $table->integer('member_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('member_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
