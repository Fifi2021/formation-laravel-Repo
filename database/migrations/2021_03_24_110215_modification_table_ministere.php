<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModificationTableMinistere extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ministeres', function (Blueprint $table) {
            //
            $table->renameColumn('designation','nom');
            $table->string('boite_postale');
            $table->dropColumn('tel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ministeres', function (Blueprint $table) {
            //
        });
    }
}
