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

		// ダウンロード用POSTデータが存在する場合
		if(Input::post()) {
			$file_name = Input::post('file_name');
			$file_path = $this->resources . Input::post('file_path');

			My_Common::download($file_name, $file_path);
		}

		// 一覧表示処理
		$class_name = get_class($this);
		$content_name = strtolower(str_replace('Controller_', '', $class_name));

		if($handle = opendir($this->resources . $content_name . '/')) {

			$i = 0;
			while(false !== ($item_name = readdir($handle))) {

				if($item_name != '.' && $item_name != '..') {

					$item_path = $this->resources . $content_name . '/' . $item_name;

					// 表示名用ファイルの場合
					if($item_name == $content_name) {
						continue;

					// ディレクトリの場合
					} elseif(is_dir($item_path)) {

						if($handle_sub = opendir($this->resources . $content_name . '/' . $item_name)) {

							$data['dirs'][$i]['dir_name'] = $item_name;

							$j = 0;
							while(false !== ($file_name = readdir($handle_sub))) {

								if($file_name != '.' && $file_name != '..') {

									$file_path = $content_name . '/' . $item_name . '/' . $file_name;

									$data['dirs'][$i]['files'][$j]['file_name'] = $file_name;
									$data['dirs'][$i]['files'][$j]['file_path'] = $file_path;

									$j++;
								}

							}

						}

					// ファイルの場合
					} else {

						$data['files'][$i]['file_name'] = $item_name;
						$data['files'][$i]['file_path'] = $content_name . '/' . $item_name;

					}

					$i++;

				}

			}

			closedir($handle);

		}

		$view = View::forge('list/index', $data);

		$fp = fopen($this->resources.$content_name.'/'.$content_name, 'r');
		if($fp) $content_disp_name = fgets($fp);

		$this->template->title = $content_disp_name ? $content_disp_name : 'Nothing';
		$this->template->content = $view;



	}


}


