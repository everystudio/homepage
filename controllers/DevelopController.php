<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * マイページトップ
 */
class DevelopController extends Controllers\Base
{
	public function __construct()
	{
		// 基底クラスの初期設定。controller配下では必ず呼び出す
		$this->initialize();

		$this->smarty->assign('title' , "開発関連");
		$this->smarty->assign('page_title' , "開発トップ");

	}

	public function index() {
		$this->smarty->assign('page_title' , "開発中のいろいろ");

		$data_list = array();

		$data["name"] 		= "スキル";
		$data["comment"] 	= "開発中と言うよりは自分のスキルなどの確認";
		$data["link"] 		= "/devSkillTop/index";
		$data_list[] = $data;

		$data["name"] 		= "Unity";
		$data["comment"] 	= "この話が一番多くなるかも？最近（自分のまわりで）話題のUnityについてのあれこれを取り上げます。";
		$data["link"] 		= "/devUnityTop/index";
		$data_list[] = $data;

		$data["name"] 		= "AWS";
		$data["comment"] 	= "自宅にサーバーとか用意できないので、サーバーはAWSを利用しています。セットアップと簡単な環境構築なんかをお伝えします。";
		$data["link"] 		= "/devAwsTop/index";
		$data_list[] = $data;

		$data["name"] 		= "C/C++";
		$data["comment"] 	= "最近見る機会がなくなったので需要があるのかどうなのか？ゲーム開発ベースで話ができれば更新してゆきます。";
		$data["comment"]   .= "個人的にはいろいろと窮屈なC/C++での開発経験は、他のプロジェクトでも役に立つと思います。最近の言語は便利すぎるんですよねぇ";
		$data["link"] 		= "/devCcppTop/index";
		$data_list[] = $data;

		$data["name"] 		= "PHP";
		$data["comment"] 	= "これは特に専門でもないので面白い話はできそうにないですが、サーバーとの連携したゲームを作る場合は簡単に作れるので必要なところでやってゆきます";
		$data["link"] 		= "/devPhpTop/index";
		$data_list[] = $data;

		$data["name"] 		= "Node.js";
		$data["comment"] 	= "やはりリアルタイム通信したいなと思いますのでNode.jsにも挑戦！";
		$data["link"] 		= "/devNodejsTop/index";
		$data_list[] = $data;

		$this->smarty->assign('data_list' , $data_list );


		$this->display( get_class($this) , __FUNCTION__ );
	}

}

















