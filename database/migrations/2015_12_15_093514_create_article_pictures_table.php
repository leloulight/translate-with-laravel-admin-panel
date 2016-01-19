<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlePicturesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('article_pictures', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('picture_name');
			$table->integer('article_id')->unsigned()->index();
			$table->foreign('article_id')
				->references('id')
				->on('articles')
				->onUpdate('cascade')
				->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('article_pictures');
	}
}
