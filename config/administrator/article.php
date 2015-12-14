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

	),
	'edit_fields' => array(
		'title' => array(
			'title' => 'Title',
			'type' => 'translations',

		),
		'body' => array(
			'title' => 'Body',
			'type' => 'translations',

		),
	),
	'sort' => array(
		'field' => 'ID',
		'direction' => 'asc',
	),
);