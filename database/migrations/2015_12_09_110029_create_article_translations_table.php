<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleTranslationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('article_translations', function (Blueprint $table) {
			$table->increments('id');

			$table->string('title'); // Translated column.

			$table->integer('article_id')->unsigned()->index();

			$table->integer('locale')->unsigned()->index();

			$table->unique(['article_id', 'locale']);

			$table->timestamps();
		});
		Schema::table('article_translations', function ($table) {
			$table->foreign('article_id')
				->references('id')
				->on('articles')
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
		Schema::drop('article_translations');
	}
}
