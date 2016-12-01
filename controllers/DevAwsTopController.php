<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * AWS
 */
class DevAwsTopController extends Controllers\Base
{
	public function __construct()
	{
		// 基底クラスの初期設定。controller配下では必ず呼び出す
		$this->initialize();

		$this->smarty->assign('title' , "AWS関連");
		$this->smarty->assign('page_title' , "AWSトップ");

	}

	public function index() {
		$this->smarty->assign('page_title' , "AWSでのあれこれ");

		$this->display( get_class($this) , __FUNCTION__ );
	}

}

















