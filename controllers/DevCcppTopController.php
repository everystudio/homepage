<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * C/C++
 */
class DevCcppTopController extends Controllers\Base
{
	public function __construct()
	{
		// 基底クラスの初期設定。controller配下では必ず呼び出す
		$this->initialize();

		$this->smarty->assign('title' , "C/C++関連");
		$this->smarty->assign('page_title' , "C/C++トップ");

	}

	public function index() {
		$this->smarty->assign('page_title' , "C/C++でのあれこれ");

		$this->display( get_class($this) , __FUNCTION__ );
	}

}

















