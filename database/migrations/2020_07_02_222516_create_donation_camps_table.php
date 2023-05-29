<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_camps', function (Blueprint $table) {
            $table->increments('id');
            $table->date('donation_date')->nullable();
            $table->time('from')->nullable();
            $table->time('to')->nullable();
            $table->string('country', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->string('city', 254)->nullable();
            $table->string('venue', 255)->nullable();
            $table->text('image')->nullable();
            $table->string('organization', 255)->nullable();
            $table->string('contact_person', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->string('status', 255)->nullable();
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
        Schema::dropIfExists('donation_camps');
    }
}
