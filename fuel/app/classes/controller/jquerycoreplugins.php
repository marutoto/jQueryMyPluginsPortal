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

		//$class_name = get_class($this);
		//$content_name = strtolower(str_replace('Controller_', '', $class_name));

		if(Input::post()) {
			$file_name = Input::post('file_name');
			$file_path = $this->resources . Input::post('file_path');

			My_Common::download($file_name, $file_path);
		}

		if($handle = opendir($this->resources.'jquerycoreplugins/')) {

			$i = 0;
			while(false !== ($item_name = readdir($handle))) {

				if($item_name != '.' && $item_name != '..') {

					// パスを取得
					//$item_path = $this->resources . $content_name . '/' . $item_name;
					$item_path = $this->resources . 'jquerycoreplugins/' . $item_name;

					// 表示名用ファイルの場合
					if($item_name == 'jquerycoreplugins') {
						continue;

					// ディレクトリの場合
					} elseif(is_dir($item_path)) {

						if($handle_sub = opendir($this->resources.'jquerycoreplugins/'.$item_name)) {

							$data['dirs'][$i]['dir_name'] = $item_name;

							$j = 0;
							while(false !== ($file_name = readdir($handle_sub))) {

								if($file_name != '.' && $file_name != '..') {

									//$file_path = $item_path . '/' . $file_name;
									$file_path = 'jquerycoreplugins/' . $item_name . '/' . $file_name;

									$data['dirs'][$i]['files'][$j]['file_name'] = $file_name;
									$data['dirs'][$i]['files'][$j]['file_path'] = $file_path;

									$j++;
								}

							}

						}

					// ファイルの場合
					} else {

						$data['files'][$i]['file_name'] = $item_name;
						$data['files'][$i]['file_path'] = 'jquerycoreplugins/' . $item_name;

					}

					$i++;

				}

			}

			closedir($handle);

		}


		$view = View::forge('jquerycoreplugins/index', $data);

		$this->template->title = 'jQuery Core Plugins';
		$this->template->content = $view;



	}


}


