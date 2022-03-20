<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()	//отвечает за внесение изменений в бд
    {
        Schema::create('permission_roles', function (Blueprint $table) {	//для создания таблицы и полей в ней
            $table->id();
            $table->string('name', 10);		//у стринга ограничение 255 вроде
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()		//используется при откате
    {
        Schema::dropIfExists('permission_roles');
    }
}
