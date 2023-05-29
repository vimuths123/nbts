<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodRequestsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blood_requests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 255)->nullable();
			$table->string('nic', 255)->nullable();
			$table->string('mobile_phone', 255)->nullable();
			$table->string('email', 255)->nullable();
			$table->string('patient_info_name', 255)->nullable();
			$table->string('blood_type', 255)->nullable();
			$table->string('blood_units', 255)->nullable();
			$table->date('required_date')->nullable();
			$table->string('country', 255)->nullable();
			$table->string('district', 255)->nullable();
			$table->string('hospital_name', 255)->nullable();
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
		Schema::dropIfExists('blood_requests');

	}
}
