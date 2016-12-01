<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * マイページトップ
 */
class ProdStoryGameController extends Controllers\Base
{
	public function __construct()
	{
		// 基底クラスの初期設定。controller配下では必ず呼び出す
		$this->initialize();

		$this->smarty->assign('title' , "美少女ゲームをつくろう");
		$this->smarty->assign('page_title' , "美少女ゲームをつくろう");

	}

	public function index() {
		$this->smarty->assign('page_title' , "クラウドワークスを使って美少女ゲームをつくろう！");

		$data_list = array();

		$data["name"] 		= "キャラクターデザイン";
		$data["comment"] 	= "現在集まっているキャラクターたち。なんか思ったよりたくさんご提案頂きました";
		$data["link"] 		= "/prodStoryGame/charaList";
		$data_list[] = $data;

		// 最後に消す
		$data["name"] 		= "CSVファイルでシナリオデータを編集する方法";
		$data["comment"] 	= "外部ファイル化されているデータを更新してスクリプトを更新する方法";
		$data["link"] 		= "/prodStoryGame/scenarioEdit";
		$data_list[] = $data;

		$this->smarty->assign( "data_list" , $data_list );

		$this->assign_link();

		$read_file = "./prodStoryGame/top.tpl";

		$this->smarty->assign( "read_file" , $read_file );

		// メソッド名がファイル名
		$this->smarty->display("product/product_common.html");
	}


	public function charaList(){
		$this->assign_link();

		$csv    = $this->di->get('csv' , array('CsvData'));
		$character_list = $csv->get( "product/StoryGame/charaData");

		foreach( $character_list as &$character ){
			$character['link_detail'] = "/prodStoryGame/charaDetail/?name={$character['name']}";
		}

		$read_file = "./prodStoryGame/charaList.tpl";

		$this->smarty->assign( "character_list" , $character_list );
		$this->smarty->assign( "read_file" , $read_file );

		// メソッド名がファイル名
		$this->smarty->display("product/product_common.html");

	}

	public function charaDetail(){
		$character_name = $_GET['name'];

		$csv    = $this->di->get('csv' , array('CsvData'));
		$character_list = $csv->get( "product/StoryGame/charaData");
		$character_data;
		foreach( $character_list as $character ){
			if( $character['name'] == $character_name ){
				$character_data = $character;
				break;
			}
		}

		$this->smarty->assign( "character_data" , $character_data );

		$read_file = "./prodStoryGame/charaDetail.tpl";
		$this->smarty->assign( "read_file" , $read_file );

		$this->link["back"] = "/prodStoryGame/charaList";
		$this->assign_link();

		$this->smarty->display("product/product_no_side.html");

	}

	/**
	*/
	public function scenarioEdit(){

		$read_file = "./prodStoryGame/scenarioEdit.tpl";
		$this->smarty->assign( "read_file" , $read_file );

		$this->link["back"] = "/prodStoryGame/index";
		$this->assign_link();

		// メソッド名がファイル名
		$this->smarty->display("product/product_no_side.html");
	}


}

















