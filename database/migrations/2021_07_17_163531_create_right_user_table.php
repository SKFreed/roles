<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRightUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('right_user', function (Blueprint $table) {
            $table->unsignedInteger('right_id');
            $table->unsignedBigInteger('user_id');


            $table->foreign('right_id') //создание ключа
            ->references('id')
                ->on('rights')
                ->onDelete('cascade');

            $table->foreign('user_id') //создание ключа
            ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('right_user', function (Blueprint $table) { //  удаление ключа
            $table->dropForeign('right_user_users_id_foreign');
            $table->dropForeign('right_user_rights_id_foreign');
        });
        Schema::dropIfExists('right_user');
    }
}
