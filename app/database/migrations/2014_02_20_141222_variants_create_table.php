<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VariantsCreateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('products', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->text('options');
            $table->text('modifiers');
            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('products');
	}

}
