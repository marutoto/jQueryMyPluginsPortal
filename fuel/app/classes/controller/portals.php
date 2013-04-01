<?php

class Controller_Portals extends Controller_Base {

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

		if($handle = opendir($this->resources)) {

			$data['dirs'] = array();

			while(false !== ($dir_name = readdir($handle))) {

				if($dir_name != '.' && $dir_name != '..') {

					$fp = fopen($this->resources.$dir_name.'/'.$dir_name, 'r');

					if($fp) {

						$dir_disp_name = fgets($fp);

						$data['dirs']['list/'.$dir_name] = $dir_disp_name;

					}

				}

			}

			closedir($handle);

		}



		$view = View::forge('portals/index', $data);

		$this->template->title = 'Core Resources TOP';
		$this->template->content = $view;

	}




}