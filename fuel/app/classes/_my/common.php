<?php

class My_Common {

	public static function download($file_name, $file_path) {


		$error['flg']     = false;
		$error['content'] = null;

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

}
