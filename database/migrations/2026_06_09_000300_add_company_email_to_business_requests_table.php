<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('business_requests', function (Blueprint $table) {
            $table->string('company_email')->nullable()->after('company_type');
        });
    }

    public function down()
    {
        Schema::table('business_requests', function (Blueprint $table) {
            $table->dropColumn('company_email');
        });
    }
};
