<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoFactorAuthToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('uses_two_factor_auth')->default(0);
            $table->string('two_factor_secret')->nullable();
            $table->string('two_factor_reset_code', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('uses_two_factor_auth');
            $table->dropColumn('two_factor_secret');
            $table->dropColumn('two_factor_reset_code', 100);
        });
    }
}
