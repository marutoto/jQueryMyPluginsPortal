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

		$data['plugins'] = array('aaa','bbb');

		$view = View::forge('jquery/pluginslist', $data);

		$this->template->title = 'yamauaaa';
		$this->template->content = $view;

	}

}


