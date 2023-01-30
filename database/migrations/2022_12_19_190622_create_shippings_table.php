<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id');
            $table->string('first_name',200);
            $table->string('last_name',200);
            $table->string('email',200);
            $table->string('number',200);
            $table->text('address',200);
            $table->string('city',200);
            $table->string('state',200);
            $table->string('country',200);
            $table->string('zip_code',200);
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
        Schema::dropIfExists('shippings');
    }
};
