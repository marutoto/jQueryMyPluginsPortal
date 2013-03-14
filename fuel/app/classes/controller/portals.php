<?php

class Controller_Portals extends Controller_Template {

	public function before() {

		parent::before();
		$this->template->css = array(
			//'bootstrap.css',
			'style.css'
		);
		$this->template->js = array();
	}

	public function action_index() {

		/*
		if($handle = opendir('')) {



		}
		*/
		$data['uri'] = Uri::base('base_url');


		$data['test'] = 'testtest';
		$view = View::forge('portals/index', $data);

		$this->template->title = 'Core Resources TOP';
		$this->template->content = $view;

	}




}