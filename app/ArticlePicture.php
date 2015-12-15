<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticlePicture extends Model {
	public function Article() {
		return $this->hasMany(Article::class);
	}
}
