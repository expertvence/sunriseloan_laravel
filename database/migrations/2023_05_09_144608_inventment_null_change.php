<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventmentNullChange extends Migration
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
        Schema::create('investments', function (Blueprint $table) {
           
            $table->string('investment_to')->nullable();
            $table->text('fathers_mane')->nullable();
            $table->text('mothers_mane')->nullable();
            $table->text('mobile')->nullable();
            $table->text('age')->nullable();
            $table->text('religion')->nullable();
            $table->text('gender')->nullable();
            $table->text('email')->nullable();
            $table->text('nid_birth_certificate')->nullable();
            $table->text('gurdian_phone')->nullable();
            $table->text('Present _address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->integer('invest_amount')->nullable();
            $table->integer('profit_amount')->nullable();           
            $table->date('start_date')->nullable();           
            $table->date('return_date')->nullable(); 
            $table->text('profit_polocy')->nullable();        
            $table->text('reference_name')->nullable();        
            $table->text('reference_address')->nullable();        
            $table->text('reference_phone')->nullable();        
            $table->text('relation')->nullable();        
            $table->string('note')->nullable()->change();        
          
        });
    }
}
