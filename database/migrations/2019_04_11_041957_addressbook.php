<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addressbook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addressbook', function (Blueprint $table) {
            $table->bigIncrements('Aid');
            $table->unsignedBigInteger('owner_uid')->nullable(true);
            $table->unsignedBigInteger('uid')->default(0);
            $table->tinyInteger('source')->default(0);
            $table->string('name', 60)->unique()->default('');
            $table->string('LastName')->nullable(true);
            $table->string('mail', 100)->nullable(true)->default('');
            $table->string('phone', 255)->default('');
            $table->string('Department', 200)->nullable(true);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->text('picture')->nullable(true);
            

            //keys
            $table->unique(['owner_uid', 'mail']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addressbook');
    }
}
