<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * ユニティトップ
 */
class DevUnityTopController extends Controllers\Base
{
	public function __construct()
	{
		// 基底クラスの初期設定。controller配下では必ず呼び出す
		$this->initialize();

		$this->smarty->assign('title' , "Unity関連");
		$this->smarty->assign('page_title' , "Unityトップ");

		$this->link['dev_unity_top'] = "/devUnityTop";

	}

	public function index() {
		$this->smarty->assign('page_title' , "Unityでのあれこれ");
		$this->smarty->assign('sub_title' , "Unityに関するトピック");
		$this->smarty->assign('sub_text' , "Unityでのセットアップや開発のサンプル作成。エラー時の対処法難かを色々リストアップ");

		$csv    = $this->di->get('csv' , array('CsvData'));
		$top_topic_data = $csv->get( "develop/unity/top_topic");

		foreach( $top_topic_data as &$data){
			$data['link'] = "/devUnityTop/topic/?id={$data['id']}";
		}

		//var_dump($top_topic_data);
		$this->smarty->assign( "top_topic_data" , $top_topic_data );

		$this->display( get_class($this) , __FUNCTION__ );
	}

	public function topic() {
		$id = $_GET['id'];

		$str_id = sprintf("%03d", $id);
		$this->display( get_class($this) , __FUNCTION__ . $str_id );

	}

}

















