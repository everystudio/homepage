<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * マイページトップ
 */
class CaptureTopController extends Controllers\Base
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

		//$aqb_element_data = $csv->get( "game/aqb/element");
		//var_dump($aqb_chara_data);
		/*
		*/


		$app_list = array();

		$aqb["name"] = "アトリエクエストボード";
		$aqb["comment"] = "おなじみアトリエシリーズのアプリです。作中もゲームよろしく錬金することでキャラクターを強化したりすることができます。ボードゲームとカードゲームが混ざっており、かわいいミニキャラとは裏腹に結構難しい・・・。";
		$aqb["link"] = "/gameAqb";

		$app_list[] = $aqb;

		$smarty->assign('page_title' , "アプリ攻略トップ");
		$smarty->assign('app_list' , $app_list );

		$this->display( get_class($this) , __FUNCTION__ );
	}
}





