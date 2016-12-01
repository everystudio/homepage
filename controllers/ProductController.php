<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * マイページトップ
 */
class ProductController extends Controllers\Base
{
	public function __construct()
	{
		// 基底クラスの初期設定。controller配下では必ず呼び出す
		$this->initialize();

		$this->smarty->assign('title' , "制作関連");
		$this->smarty->assign('page_title' , "アトリエクエストボード攻略");

	}

	public function index() {
		$this->smarty->assign('page_title' , "サークルの制作物のまとめ");

		$data_list = array();

		$data["name"] 		= "美少女ゲームをつくろう";
		$data["comment"] 	= "クラウドワークスを利用してゲームを";
		$data["link"] 		= "/ProdStoryGame/index";
		$data_list[] = $data;


		$this->smarty->assign( "data_list" , $data_list );
		$this->display( get_class($this) , __FUNCTION__ );
	}

}

















