<?php
$config = array(
	'manage/login' => array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|valid_email'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required'
		)
	),
	
	'page/add' => array(
		array(
			'field' => 'slug',
			'label' => 'Slug',
			'rules' => 'required'
		),
		array(
			'field' => 'menu_label',
			'label' => 'Menu Label',
			'rules' => 'required'
		),
		array(
			'field' => 'content',
			'label' => 'Content',
			'rules' => 'required'
		)
	),
	
	'package/add' => array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required'
		),
		array(
			'field' => 'description',
			'label' => 'Description',
			'rules' => 'required'
		),
		array(
			'field' => 'price',
			'label' => 'Price',
			'rules' => 'required'
		)
	),
);
?>
