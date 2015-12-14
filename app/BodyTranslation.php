<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyTranslation extends Model {
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
	public function Body() {
		return $this->belongsTo(Body::class);
	}
	public function toLocale() {
		return $this->belongsTo(Locale::class, 'locale', 'id');
	}
}
