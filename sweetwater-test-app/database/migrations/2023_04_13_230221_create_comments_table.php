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
        Schema::create('sweetwater_test', function (Blueprint $table) {
            $table->bigIncrements('orderid');
            $table->string('comments');
			$table->dateTime('shipdate_expected');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sweetwater_test');
    }
};
