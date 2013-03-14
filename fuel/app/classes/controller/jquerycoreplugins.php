<?php

class Controller_Jquerycoreplugins extends Controller_Template {

	public function before() {

		parent::before();
		$this->template->css = array(
			'style.css'
		);
		$this->template->js = array();
	}

	public function action_index() {

		$data['plugins'] = array('slideshow','lightbox');

		$view = View::forge('jquerycoreplugins/index', $data);

		$this->template->title = 'jQuery Core Plugins';
		$this->template->content = $view;

	}

}


