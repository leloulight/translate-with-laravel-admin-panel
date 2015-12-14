<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', function () {
	// $ar = App\ArticleTranslation::first();
	// $ar->title_ex = $ar->title;
	// dd($ar);

	// $ar = DB::table('article_translations')->where('locale', '4')->pluck('title');
	$ar = App\Article::first();
	// echo $ar->title;
	// echo $ar;
	dd($ar);
});
