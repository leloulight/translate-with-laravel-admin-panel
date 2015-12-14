<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Translator\IsTranslatable;
use Vinkla\Translator\Translatable;

/**
 * This is the article eloquent model class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Body extends Model implements IsTranslatable {
	use Translatable;

	/**
	 * A list of methods protected from mass assignment.
	 *
	 * @var string[]
	 */
	protected $guarded = ['_token', '_method'];

	/**
	 * The translated attributes.
	 *
	 * @var string[]
	 */
	protected $translatedAttributes = ['title'];

	/**
	 * Get the translations relation.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function translations() {
		return $this->hasMany(BodyTranslation::class);
	}
}