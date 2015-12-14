<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBodyTranslationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('body_translations', function (Blueprint $table) {
			$table->increments('id');
			$table->text('title');
			$table->integer('locale')->unsigned()->index();
			$table->integer('body_id')->unsigned()->index();
			$table->timestamps();
		});
		Schema::table('body_translations', function ($table) {
			$table->foreign('body_id')
				->references('id')
				->on('bodies')
				->onDelete('cascade');
			$table->foreign('locale')
				->references('id')
				->on('locale')
				->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('body_translations');
	}
}
