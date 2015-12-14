<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model {

	/**
	 * @var array
	 */
	protected $guarded = ['_token', '_method'];

	/**
	 * @param  $value
	 * @return mixed
	 */

	/**
	 * @return mixed
	 */
	public function Article() {
		return $this->belongsTo(Article::class);
	}
	/**
	 * @return mixed
	 */
	public function toLocale() {
		return $this->belongsTo(Locale::class, 'locale', 'id');
	}
}
