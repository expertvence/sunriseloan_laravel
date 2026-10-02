<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $columns = ['age', 'religion', 'fathers_name', 'mothers_name'];

    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->text('age')->nullable()->change();
            $table->text('religion')->nullable()->change();
            $table->text('fathers_name')->nullable()->change();
            $table->text('mothers_name')->nullable()->change();
        });
    }

    public function down(): void
    {
        foreach ($this->columns as $column) {
            DB::table('members')->whereNull($column)->update([$column => '']);
        }

        Schema::table('members', function (Blueprint $table) {
            $table->text('age')->nullable(false)->change();
            $table->text('religion')->nullable(false)->change();
            $table->text('fathers_name')->nullable(false)->change();
            $table->text('mothers_name')->nullable(false)->change();
        });
    }
};