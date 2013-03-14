<?php

class Controller_Common extends Controller_Base {

	public function before() {

		parent::before();

	}

	public static function action_download() {

		$file_name = Input::post('file_name');
		$file_path = $this->resources . Input::post('file_path');


		//ファイルの存在を確認
		if(!file_exists($file_path)) {
			$error['flg']     = true;
			$error['content'] = '指定されたファイルが存在しません。';
			return $error;
		}

		//オープンできるか確認
		if(!($fp = fopen($file_path, 'r'))) {
			$error['flg']     = true;
			$error['content'] = 'ファイルが開けません。もう一度試してください。';
			return $error;
		}
		fclose($fp);

		//ファイルサイズの確認
		if(($file_size = filesize($file_path)) == 0) {
			$error['flg']     = true;
			$error['content'] = 'ファイルサイズが0です。';
			return $error;
		}

		//HTTPヘッダを取得
		//Debug::dump($file_path);exit;
		//$header = get_headers($file_path);
		//Debug::dump($header);exit;

		//ダウンロード用のHTTPヘッダを送信
		header('Content-Type: application/octet-stream');
		//header('Content-Type: text/plain');
		header('Content-Disposition: attachment; filename="'.$file_name.'"');
		header('Content-Length: '.$file_size);

		//ファイルを読み込んで出力
		if(!readfile($file_path)) {
			$error['flg']     = true;
			$error['content'] = 'ファイルを読み込めません。';
			return $error;
		}


	}



	/**
	 * 指定されたファイルをダウンロードする
	 * @access  public static
	 * @param   string $file_path
	 * @param   string $file_name
	 * @return  bool   $error
	 */
	public static function download_file($file_path = null, $file_name = null) {

		$error['flg']     = false;
		$error['content'] = null;

		//引数チェック
		if($file_path == null || $file_name == null) {
			$error['flg']     = true;
			$error['content'] = 'ファイルが指定されていません。';
			return $error;
		}

		//ファイルの存在を確認
		if(!file_exists($file_path)) {
			$error['flg']     = true;
			$error['content'] = '指定されたファイルが存在しません。';
			return $error;
		}

		//オープンできるか確認
		if(!($fp = fopen($file_path, 'r'))) {
			$error['flg']     = true;
			$error['content'] = 'ファイルが開けません。もう一度試してください。';
			return $error;
		}
		fclose($fp);

		//ファイルサイズの確認
		if(($file_size = filesize($file_path)) == 0) {
			$error['flg']     = true;
			$error['content'] = 'ファイルサイズが0です。';
			return $error;
		}

		//HTTPヘッダを取得
		//Debug::dump($file_path);exit;
		//$header = get_headers($file_path);
		//Debug::dump($header);exit;

		//ダウンロード用のHTTPヘッダを送信
		header('Content-Type: application/octet-stream');
		//header('Content-Type: text/plain');
		header('Content-Disposition: attachment; filename="'.$file_name.'"');
		header('Content-Length: '.$file_size);

		//ファイルを読み込んで出力
		if(!readfile($file_path)) {
			$error['flg']     = true;
			$error['content'] = 'ファイルを読み込めません。';
			return $error;
		}

		return $error;

	}


}
