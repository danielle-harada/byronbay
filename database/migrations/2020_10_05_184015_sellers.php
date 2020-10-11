<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class sellers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sellers', function(Blueprint $table){
            $table->increments('id');
            $table->string('corpName',250);
            $table->string('brandName', 200);
            $table->string('cnpj',14);
            $table->string('cep', 8);
            $table->string('street',200);
            $table->string('number',10);
            $table->string('adressComp',50);
            $table->string('city',100);
            $table->string('state',2);
            $table->string('phoneCode1',2);
            $table->string('phone',9);
            $table->string('description',500);
            $table->string('email',80);
            $table->string('password',30);
            $table->string('photo');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('sellers');
    }
}
