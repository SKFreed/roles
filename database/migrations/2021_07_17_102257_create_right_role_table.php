<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRightRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('right_role', function (Blueprint $table) {
            $table->unsignedInteger('right_id');
            $table->unsignedInteger('role_id');


            $table->foreign('role_id') //создание ключа
            ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('right_id') //создание ключа
            ->references('id')
                ->on('rights')
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
        Schema::table('right_role', function (Blueprint $table) { //  удаление ключа
            $table->dropForeign('right_role_rights_id_foreign');
            $table->dropForeign('right_role_roles_id_foreign');
        });

        Schema::dropIfExists('right_role');
    }
}
