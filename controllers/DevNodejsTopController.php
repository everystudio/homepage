<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * Node.js
 */
class DevNodejsTopController extends Controllers\Base
{
	public function __construct()
	{
		// 基底クラスの初期設定。controller配下では必ず呼び出す
		$this->initialize();

		$this->smarty->assign('title' , "Node.js関連");
		$this->smarty->assign('page_title' , "Node.jsトップ");

	}

	public function index() {
		$this->smarty->assign('page_title' , "Node.jsでのあれこれ");
		$this->display( get_class($this) , __FUNCTION__ );
	}

}
















