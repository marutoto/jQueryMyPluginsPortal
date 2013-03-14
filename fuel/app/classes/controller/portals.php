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

		// これでドキュメントルートを取ってくれる
		// 「http://yamauaa.achoo.jp/portals/public/」
		$data['uri'] = DOCROOT.'/assets/resourecs';


		/*
		if($handle = opendir(Uri::base('base_url') . 'assets/resources')) {

			while(false !== ($file = readdir($handle))) {
				$data['file'] = $file;
			}

			closedir($handle);

		}
		*/



		$view = View::forge('portals/index', $data);

		$this->template->title = 'Core Resources TOP';
		$this->template->content = $view;

	}




}