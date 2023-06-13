<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_no')->nullable();
            $table->text('image')->nullable();
            $table->string('first_name', 45);
            $table->string('last_name', 45);
            $table->string('email', 45);
            $table->string('gender', 45);
            $table->integer('age');
            $table->date('dob');
            $table->text('address');
            $table->integer('country_code')->default(94);
            $table->string('telephone', 45);
            $table->integer('active')->default(1)->comment('1 for active');
            $table->integer('deleted')->default(0)->comment('1 for deleted');
            $table->datetime('created_at');
            $table->datetime('updated_at');
            $table->bigInteger('users_id')->unsigned()->nullable();

            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
