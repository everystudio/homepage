<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * マイページトップ
 */
class GameAqbController extends Controllers\Base
{
	public function __construct()
	{
		// 基底クラスの初期設定。controller配下では必ず呼び出す
		$this->initialize();

		$this->smarty->assign('title' , "アトリエクエストボード");
		$this->smarty->assign('page_title' , "アトリエクエストボード攻略");

		$this->link['aqb_top'] = "/gameAqb";
		$this->link['aqb_quest'] = "/gameAqb/quest";
		$this->link['aqb_element'] = "/gameAqb/element";
		$this->link['aqb_recipe'] = "/gameAqb/recipe";
		$this->link['aqb_special'] = "/gameAqb/special";

	}

	public function index() {
		$this->smarty->assign('page_title' , "アトリエクエストボード攻略トップ");

		$csv    = $this->di->get('csv' , array('CsvData'));

		// csvからデータを取ってくる
		//$dao_lot_info = $this->di->get('csv' , array('LotteryInfo'));

		//$aqb_element_data = $csv->get( "game/aqb/element");
		//var_dump($aqb_chara_data);
		/*
		*/
		$data_list = array();

		$data["name"] 		= "クエスト";
		$data["comment"] 	= "通常クエストやイベント用のクエストなど";
		$data["link"] 		= "/gameAqb/quest";
		$data_list[] = $data;

		$data["name"] 		= "素材";
		$data["comment"] 	= "クエストなどで手に入る素材のまとめ。どこで取れるとかそういうのもできるだけ載せます";
		$data["link"] 		= "/gameAqb/element";
		$data_list[] = $data;

		$data["name"] 		= "レシピ・アイテム・武具関連";
		$data["comment"] 	= "主に錬金で生成できるもの。装備品とかの性能とかもまとめます";
		$data["link"] 		= "/gameAqb/recipe";
		$data_list[] = $data;

		$data["name"] 		= "特性情報";
		$data["comment"] 	= "意外と知りたくなる、特性の作り方や効果。適当にやって知らないの出るとうれしいので、そういうのが好きな方は見ないほうがいいかも。";
		$data["link"] 		= "/gameAqb/special";
		$data_list[] = $data;

		$this->smarty->assign('data_list' , $data_list );

		$this->display( get_class($this) , __FUNCTION__ );
	}

	public function quest(){
		$this->display( get_class($this) , __FUNCTION__ );
	}

	/**
		素材の一覧表示
	*/
	public function element(){
		// csvからデータを取ってくる

		$csv    = $this->di->get('csv' , array('CsvData'));
		$aqb_element_list = $csv->get( "game/aqb/element");

		$count = 0;
		$data_list = array();
		foreach( $aqb_element_list as $element ){
			if( 0 < $element['id']){
				$element['link_detail'] = "/gameAqb/elementDetail/?name={$element['name']}";
				$data_list[] = $element;
			}
		}
		$this->smarty->assign('data_list',$data_list);

		$this->display( get_class($this) , __FUNCTION__ );
	}

	/**
		素材の詳細表示・逆引き
		この素材でどんなものが錬金できるかとかを調べることができる
	*/
	public function elementDetail(){

		$element_name = $_GET['name'];
		$element = array();

		//echo $element_name;

		$csv    = $this->di->get('csv' , array('CsvData'));
		$aqb_element_list = $csv->get( "game/aqb/element");
		foreach ($aqb_element_list as $temp ) {
			if( $temp['name'] == $element_name ){
				$element = $temp;
				break;
			}
		}

		$aqb_recipe_list = $csv->get( "game/aqb/recipe");

		$recipe_facade = $this->di->get('facade',array("AqbRecipeFacade"));

		$item_list = array();
		$equip_list= array();
//		var_dump($aqb_recipe_list);
		foreach( $aqb_recipe_list as $recipe ){

			$recipe_facade->addLink( &$recipe );

			$hit = false;
			for( $i = 1 ; $i <= 4 ; $i++ ){
				if( $recipe['item'.$i] == $element_name ){
					$hit = true;
				}
			}
			if( $hit ){
				if( $recipe['equip'] == "なし"){
					$item_list[] = $recipe;
				}
				else {
					$equip_list[] = $recipe;
				}
			}
		}

//		var_dump($equip_list);

		$this->smarty->assign('element_name',$element_name);
		$this->smarty->assign('element',$element);
		$this->smarty->assign('item_list',$item_list);
		$this->smarty->assign('item_num',count($item_list));
		$this->smarty->assign('equip_list',$equip_list);
		$this->smarty->assign('equip_num',count($equip_list));

		$this->display( get_class($this) , __FUNCTION__ );

		return;
	}

	/**
		レシピ一覧の表示
	*/
	public function recipe(){

		$csv    = $this->di->get('csv' , array('CsvData'));
		$aqb_recipe_list = $csv->get( "game/aqb/recipe");
		$recipe_facade = $this->di->get('facade',array("AqbRecipeFacade"));
		//var_dump($aqb_recipe_list);

		$item_list = array();
		$equip_list= array();
		foreach( $aqb_recipe_list as $recipe ){
			$recipe_facade->addLink( &$recipe );
			if( $recipe['equip'] == "なし"){
				$item_list[] = $recipe;
			}
			else {
				$equip_list[] = $recipe;
			}
		}

		//var_dump($item_list);

		$this->smarty->assign('item_list',$item_list);
		$this->smarty->assign('equip_list',$equip_list);

		$this->display( get_class($this) , __FUNCTION__ );
	}

	public function special(){
		$this->smarty->assign('page_title' , "特性一覧");

		$csv    = $this->di->get('csv' , array('CsvData'));
		$csv_special_list = $csv->get( "game/aqb/special");
		$special_facade = $this->di->get('facade',array("AqbSpecialFacade"));

		$special_list = array();
		foreach( $csv_special_list as $special ){
			if( $special['name'] != 'なし'){
				$special_facade->addLink(&$special);
				$special_list[] = $special;
			}
		}
		$this->smarty->assign('special_list' , $special_list );


		$this->display( get_class($this) , __FUNCTION__ );
	}

	public function specialDetail(){
		$special_name = $_GET['name'];
		echo $special_name;
		echo "<br />";

		$this->smarty->assign('page_title' , "特性詳細");

		$csv    = $this->di->get('csv' , array('CsvData'));
		$csv_special_list = $csv->get( "game/aqb/special");
		$special_facade = $this->di->get('facade',array("AqbSpecialFacade"));

		$select_special;
		$temp_list = array();
		foreach( $csv_special_list as $special ){
			if( $special['name'] != 'なし'){
				$special_facade->addLink(&$special);
				$temp_list[] = $special;
			}
			if( $special_name == $special['name']){
				$select_special = $special;
			}
		}

		foreach( $temp_list as $special ){
			if($select_special['combi1']==$special['name']){
				$special_list[] = $special;
			}
			if($select_special['combi2']==$special['name']){
				$special_list[] = $special;
			}
		}


		$this->smarty->assign('select_special' , $select_special );
		$this->smarty->assign('special_list' , $special_list );


		$this->display( get_class($this) , __FUNCTION__ );
	}




}

















