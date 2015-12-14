<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model {
	protected $table = 'locale';

	protected $fillable = ['name'];
	public function language() {
		return $this->hasMany(ArticleTranslation::class, 'locale');
	}
}
