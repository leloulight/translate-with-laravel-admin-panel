<?php

return array(
	'title' => 'Body Translates',
	'single' => 'body translate',
	'model' => 'App\BodyTranslation',

	'columns' => array(
		'id' => array(
			'title' => 'ID',
		),
		'title' => array(
			'title' => 'title',
		),

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
		'body_id' => array(
			'title' => 'Article ID'),

	),
	'edit_fields' => array(
		'title' => array(
			'title' => "Translated Text",
			'type' => 'text',
		),
		'toLocale' => array(
			'title' => 'Select Language',
			'type' => 'relationship',
			'select' => '(:table).name',
		),

		'body' => array(
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