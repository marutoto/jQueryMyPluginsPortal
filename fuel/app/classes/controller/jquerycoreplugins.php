<?php

class Controller_Jquerycoreplugins extends Controller_Base {

	public function before() {

		parent::before();
		$this->template->css = array(
			'style.css'
		);
		$this->template->js = array();
	}

	public function action_index() {

		if($handle = opendir($this->resources)) {

			$data['items'] = array();

			$i=0;
			while(false !== ($item_name = readdir($handle))) {

				if($item_name != '.' && $item_name != '..') {

					$item_path = $this->resources . 'jquerycoreplugins/' . $item_name;

					//$class_name = get_class($this);
					//$dir_name = strtolower(str_replace('Controller_', '', $class_name));

					// 表示名用ファイルの場合
					if($item_name == 'jquerycoreplugins') {
						continue;

					// ディレクトリの場合
					} elseif(is_dir($item_path)) {
						$data['items'][$i] = $item_name . 'dir';

					// ファイルの場合
					} else {
						$data['items'][$i] = $item_name . 'file';
					}

					$i++;

				}

			}

			closedir($handle);

		}




		$data['plugins'] = array('slideshow','lightbox');

		$view = View::forge('jquerycoreplugins/index', $data);

		$this->template->title = 'jQuery Core Plugins';
		$this->template->content = $view;

	}

}


