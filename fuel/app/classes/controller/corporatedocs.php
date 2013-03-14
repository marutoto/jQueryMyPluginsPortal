<?php

class Controller_Corporatedocs extends Controller_Base {

	public function before() {

		parent::before();
		$this->template->css = array(
			'style.css'
		);
		$this->template->js = array();
	}

	public function action_index() {

		$data['plugins'] = array('slideshow','lightbox');

		$view = View::forge('corporatedocs/index', $data);

		$this->template->title = 'Corporatedocs';
		$this->template->content = $view;

	}

}


