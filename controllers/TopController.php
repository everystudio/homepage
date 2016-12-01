<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * マイページトップ
 */
class TopController extends Controllers\Base
{
	public function __construct()
	{
	// 基底クラスの初期設定。controller配下では必ず呼び出す
	$this->initialize();
	}

	public function index() {

		// 設定ファイル読み込み
		$config = $this->di->get('config');
		$smarty = $this->di->get('smarty');
		$csv    = $this->di->get('csv' , array('CsvData'));

		// csvからデータを取ってくる
		//$dao_lot_info = $this->di->get('csv' , array('LotteryInfo'));
		//$aqb_chara_data = $csv->get( "game/aqb/element");
		//var_dump($aqb_chara_data);

		//$smarty->assign('name' , $aqb_chara_data[0]["name"]);

		$this->display( get_class($this) , __FUNCTION__ );
	}

	public function test(){
$this->smarty->assign( 'syntaxHighlighter' , '/plugin/syntaxhighlighter_3.0.83');

		$this->display( get_class($this) , __FUNCTION__ );
	}
	public function test2(){
		$this->smarty->assign( 'syntaxHighlighter' , '/plugin/syntaxhighlighter_2.1.364');

		$this->display( get_class($this) , __FUNCTION__ );
	}
}





