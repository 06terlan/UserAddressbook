<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedBigInteger('uid')->default(0);
            $table->tinyInteger('source')->default(0);
            $table->string('name', 60)->unique()->default('');
            $table->string('LastName')->nullable(true);
            $table->string('mail', 254)->default('');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            

            //keys
            $table->primary('uid');
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
        Schema::dropIfExists('users');
    }
}
