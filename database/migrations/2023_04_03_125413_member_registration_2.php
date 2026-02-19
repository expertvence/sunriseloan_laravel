<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MemberRegistration2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->text('nid')->nullable()->after('share_amount');
            $table->text('member_photo')->nullable()->after('nid');
            $table->text('member_profession')->nullable()->after('member_photo');
            $table->text('nomini_name')->nullable()->after('member_profession');
            $table->text('nomini_relation')->nullable()->after('nomini_name');
            $table->text('nomini_age')->nullable()->after('nomini_relation');
            $table->text('nomini_barth_or_ind')->nullable()->after('nomini_age');
            $table->text('nomini_address')->nullable()->after('nomini_barth_or_ind');
            $table->text('nomini_photo')->nullable()->after('nomini_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            //
        });
    }
}
