<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 50)->unique();
            //$table->timestamp('email_verified_at')->nullable();
			$table->unsignedInteger('age')->nullable();
			$table->string('city', 50)->nullable();
			$table->string('education', 50)->nullable();
			$table->string('site', 50)->nullable();
            $table->string('password');		//4-32
			$table->foreignId('permission_role_id')->constrained();		//а????
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
