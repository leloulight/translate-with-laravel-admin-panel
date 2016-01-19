<?php

return array(
	'title' => 'Article Translates',
	'single' => 'article translate',
	'model' => 'App\ArticleTranslation',

	'columns' => array(
		'id' => array(
			'title' => 'ID',
		),
		'title' => array(
			'title' => 'title',
		),
		'body' => array(
			'title' => 'body'),

		'toLocale' => array(
			'type' => 'relationship',
			'title' => 'Language',
			'name_field' => 'name',
			// 'select' =>  '(:table).id '
			'output' => function ($output) {
				$output = json_decode($output, true);
				return $output['name'];
			},
		),
		// 'lang'=>array(
		// 	'title'=>'Language',
		// 	'relationship'=>'locale',
		// 	'select'=>'(:table).name'

		// 	// 'output'=>function($value) {

		//  //        return json_decode($value)->name;
		//     // },

		// 	),
		'article_id' => array(
			'title' => 'Article ID'),

	),
	'edit_fields' => array(
		'title' => array(
			'title' => "Translated Article Article",
			'type' => 'text',
		),
		'body' => array(
			'title' => "Translated Body",
			'type' => 'textarea',
		),
		'toLocale' => array(
			'title' => 'Select Language',
			'type' => 'relationship',
			'select' => '(:table).name',
		),

		'article' => array(
			'type' => 'relationship',
			'title' => 'Article IDs',
			'name_field' => 'id',
		),

	),
	'filters' => array(
		'toLocale' => array(
			'type' => 'relationship',
			'title' => 'Languages',
			'name_field' => 'name',
		),

		'article_id' => array(
			'title' => 'Article IDs',
			'name_field' => 'article_id',
		),
	),
	'sort' => array(
		'field' => 'ID',
		'direction' => 'asc',
	),
);