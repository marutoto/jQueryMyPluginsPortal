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
		// $data['uri'] = Uri::base('base_url') . 'assets/resourecs';
		// 「http://yamauaa.achoo.jp/portals/public/」
		// $data['uri'] = DOCROOT . 'assets/resourecs';
		// 「/home/marutoto/www/yamauaa/portals/public/assets/resourecs」

		if($handle = opendir(DOCROOT.'assets/resourecs')) {

			while(false !== ($file = readdir($handle))) {
				$data['file'] = $file;
			}

			closedir($handle);

		}



		$view = View::forge('portals/index', $data);

		$this->template->title = 'Core Resources TOP';
		$this->template->content = $view;

	}




}