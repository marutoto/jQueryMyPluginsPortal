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

		//$data['path'] = Config::get('path.resources');

		if($handle = opendir(Config::get('path.resources'))) {

			$data['dirs'] = array();

			while(false !== ($dir_name = readdir($handle))) {

				//$dir_disp_name = xxx;

				if($dir_name != '.' && $dir_name != '..') {
					$data['dirs'][$dir_name] = $dir_name.' Name';
				}
			}

			closedir($handle);

		}



		$view = View::forge('portals/index', $data);

		$this->template->title = 'Core Resources TOP';
		$this->template->content = $view;

	}




}