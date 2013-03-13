<?php

class Controller_Jquery extends Controller_Template {

	public function before() {

		parent::before();
		$this->template->css = array(
			'style.css'
		);
		$this->template->js = array();
	}

	public function action_pluginslist() {

		$data['plugins'] = array('slideshow','lightbox');

		$view = View::forge('jquery/pluginslist', $data);

		$this->template->title = 'jQuery Core Plugins';
		$this->template->content = $view;

	}

}


