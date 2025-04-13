<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_reviews', function (Blueprint $table) {
            $table->string('phone_number')->nullable(); // or remove nullable if required
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_reviews', function (Blueprint $table) {
            $table->dropColumn('phone_number');
        });
    }
};
