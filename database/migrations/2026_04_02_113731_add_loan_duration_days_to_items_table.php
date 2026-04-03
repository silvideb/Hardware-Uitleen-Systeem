<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('Hardware_Items', function (Blueprint $table) {
        $table->integer('loan_duration_days')->default(14);
    });
}

public function down()
{
    Schema::table('Hardware_Items', function (Blueprint $table) {
        $table->dropColumn('loan_duration_days');
    });
}
};