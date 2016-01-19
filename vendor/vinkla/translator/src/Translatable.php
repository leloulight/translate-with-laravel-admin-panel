<?php

/*
 * This file is part of Laravel Translator.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vinkla\Translator;

use Illuminate\Support\Facades\Config;

/**
 * This is the translatable trait.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
trait Translatable {
	/**
	 * The translations cache.
	 *
	 * @var array
	 */
	protected $cache = [];

	/**
	 * Get a translation.
	 *
	 * @param  string|null                                       $locale
	 * @param  bool                                              $fallback
	 * @return \Illuminate\Database\Eloquent\Model|null|static
	 */
	public function translate($locale = null, $fallback = true) {
		$locale = $locale ?: $this->getLocale();

		$translation = $this->getTranslation($locale);
		// dd($translation);
		if (!$translation && $fallback) {
			$translation = $this->getTranslation($this->getFallback());
			// dd($translation);
		}

		if (!$translation && !$fallback) {
			foreach ($this->translatedAttributes as $attribute) {
				$translation = $this->setAttribute($attribute, null);
				// dd($translation);
			}
		}
		// dd($translation);
		return $translation;
	}

	/**
	 * Get a translation or create new.
	 *
	 * @param  string                                       $locale
	 * @return \Illuminate\Database\Eloquent\Model|static
	 */
	protected function translateOrNew($locale) {
		$translation = $this->translate($locale);

		if (!$translation) {
			$translation = $this->translations()
				->where('locale', $locale)
				->firstOrNew(['locale' => $locale]);
		}
		// dd($translation);
		return $translation;
	}

	/**
	 * Get a translation.
	 *
	 * @param  string                                            $locale
	 * @return \Illuminate\Database\Eloquent\Model|static|null
	 */
	protected function getTranslation($locale) {
		if (isset($this->cache[$locale])) {
			return $this->cache[$locale];
		}

		$translation = $this->translations()
			->where('locale', $locale)
			->first();
		// dd($translation);
		if ($translation) {
			$this->cache[$locale] = $translation;
		}
		// dd($translation);
		return $translation;
	}

	/**
	 * Get an attribute from the model or translation.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function getAttribute($key) {

		if (in_array($key, $this->translatedAttributes)) {
			return $this->translate() ? $this->translate()->$key : null;
		}

		return parent::getAttribute($key);
	}

	/**
	 * Set a given attribute on the model or translation.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return mixed
	 */
	public function setAttribute($key, $value) {
		if (in_array($key, $this->translatedAttributes)) {
			$translation = $this->translateOrNew($this->getLocale());

			$translation->$key = $value;
			// dd($this->translatedAttributes);
			return $this->cache[$this->getLocale()] = $translation;
		}

		return parent::setAttribute($key, $value);
	}

	/**
	 * Finish processing on a successful save operation.
	 *
	 * @param  array  $options
	 * @return void
	 */
	protected function finishSave(array $options) {
		$this->translations()->saveMany($this->cache);

		parent::finishSave($options);
	}

	/**
	 * Get the locale.
	 *
	 * @return string
	 */
	protected function getLocale() {
		// var_dump(config('languages')['default']);exit;
		return config('languages')['default'];
	}

	/**
	 * Get the fallback locale.
	 *
	 * @return string
	 */
	protected function getFallback() {
		return Config::get('app.fallback_locale');
	}

	/**
	 * Get the translations relation.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	abstract public function translations();
}
