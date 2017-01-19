<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdjustUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'nickname')->change();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')->unique()->change();
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
            $table->dropUnique('users_nickname_unique')->change();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('nickname', 'name')->change();
        });
    }
}
