<?php

return array(
	'title' => 'Article',
	'single' => 'article',
	'model' => 'App\Article',

	'columns' => array(
		'id',
		'translations' => array(
			'type' => 'relationship',
			'title' => 'Title',
			'sortable' => 'false',
			'name_field' => 'title',
			'output' => function ($output) {
				$output = json_decode($output, true);
				$key = array_search(config('languages')['default'], array_column($output, 'locale'));
				return $output[$key]['title'];
			},

		),
		'translationsbody' => array(
			'type' => 'relationship',
			'title' => 'Body',
			'sortable' => 'false',
			'name_field' => 'body',
			'output' => function ($output) {
				$output = json_decode($output, true);
				$key = array_search(config('languages')['default'], array_column($output, 'locale'));
				return $output[$key]['body'];
			},

		),
		'picture_name' => array(
			'title' => 'Image',
			'output' => '<img src="/uploads/products/thumbs/full/(:value)" height="100" />',
		),

	),
	'edit_fields' => array(
		'title' => array(
			'title' => 'Title',
			'type' => 'text',

		),
		'body' => array(
			'title' => 'body',
			'type' => 'wysiwyg',

		),
		'picture_name' => array(
			'title' => 'Image',
			'type' => 'image',
			'location' => public_path() . '/uploads/products/originals/',
			'naming' => 'random',
			'length' => 20,
			'size_limit' => 2,
			'sizes' => array(
				array(65, 57, 'crop', public_path() . '/uploads/products/thumbs/small/', 100),
				array(220, 138, 'landscape', public_path() . '/uploads/products/thumbs/medium/', 100),
				array(383, 276, 'fit', public_path() . '/uploads/products/thumbs/full/', 100),
			),
		),

	),
	'sort' => array(
		'field' => 'ID',
		'direction' => 'asc',
	),
	'form_width' => 600,
);