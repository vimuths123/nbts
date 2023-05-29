<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('title', 255)->nullable();
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->boolean('gender')->default(1);
            $table->date('date_of_birth')->nullable();
            $table->string('blood_group', 255)->nullable();
            $table->string('nic', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('current_province', 255)->nullable();
            $table->string('current_district', 255)->nullable();
            $table->string('current_city', 255)->nullable();
            $table->string('current_address', 255)->nullable();
            $table->string('mobile_phone', 255)->nullable();
            $table->string('home_phone', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->json('contact_me_via')->nullable();
            $table->text('description')->nullable();
            $table->string('facebook_profile', 255)->nullable();
            $table->string('twitter_handler', 255)->nullable();
            $table->string('google_profile', 255)->nullable();
            $table->string('whatsapp_number', 255)->nullable();
            $table->string('viber_number', 255)->nullable();
            $table->string('instagram_handler', 255)->nullable();
            $table->json('contact_social_media')->nullable();
            $table->string('terms_conditions')->nullable();
            $table->date('last_donated_date')->nullable();
            $table->boolean('felt_sick_after')->default(0)->nullable();
            $table->date('last_took_medicine')->nullable();
            $table->boolean('live_new_location')->default(0)->nullable();
            $table->text('new_location')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }

}
