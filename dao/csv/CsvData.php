<?php

require_once __DIR__.'/DaoCsvBase.php';

use Dao\Csv;

/* 
 * @package csv
 * @auther mukaiyama
 * @ver 1.00
 */

class CsvData extends Csv\DaoCsvBase
{
	public function __construct($di)
	{
		// 基底クラスの初期設定。
		$this->initialize($di);
	}

	/**
	ファイル名はディレクトリ名付きで
	*/
	public function get( $filename ){
		//取得するcsvデータの名前を設定
		$this->targetFile = $filename;
		//対象のcsvファイルからデータに起こす。
		$csv_cache = $this->getData();

		return $csv_cache;
	}

}


