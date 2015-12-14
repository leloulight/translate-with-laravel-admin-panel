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
			'title' => 'Title',
			'sortable' => 'false',
			'name_field' => 'title',
			'output' => function ($output) {
				$output = json_decode($output, true);
				$key = array_search(config('languages')['default'], array_column($output, 'locale'));
				return $output[$key]['body'];
			},

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
	),
	'sort' => array(
		'field' => 'ID',
		'direction' => 'asc',
	),
);