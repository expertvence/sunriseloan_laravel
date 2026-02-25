<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable()->after('name');
            $table->string('age')->nullable()->after('gender');
            $table->string('religion')->nullable()->after('age');

            $table->string('fathers_name')->nullable()->after('religion');
            $table->string('mothers_name')->nullable()->after('fathers_name');

            $table->string('mobile')->nullable()->after('mothers_name');
            $table->text('address')->nullable()->after('mobile');

            $table->string('nid')->nullable()->after('address');
            $table->string('profession')->nullable()->after('nid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('age');
            $table->dropColumn('religion');
            $table->dropColumn('fathers_name');
            $table->dropColumn('mothers_name');
            $table->dropColumn('mobile');
            $table->dropColumn('address');
            $table->dropColumn('nid');
            $table->dropColumn('profession');
        });
    }
};
