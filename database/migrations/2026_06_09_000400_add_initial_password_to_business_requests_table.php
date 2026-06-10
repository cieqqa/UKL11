<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('business_requests', function (Blueprint $table) {
            $table->string('initial_password')->nullable()->after('foto');
        });
    }

    public function down()
    {
        Schema::table('business_requests', function (Blueprint $table) {
            $table->dropColumn('initial_password');
        });
    }
};
