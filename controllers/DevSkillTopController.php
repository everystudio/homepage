<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * スキルトップ
 */
class DevSkillTopController extends Controllers\Base
{
	public function __construct()
	{
		// 基底クラスの初期設定。controller配下では必ず呼び出す
		$this->initialize();

		$this->smarty->assign('title' , "Skill関連");
		$this->smarty->assign('page_title' , "Skillトップ");

		$this->link['dev_skill_top'] = "/devSkillTop";

	}

	public function index() {
		$this->smarty->assign('page_title' , "スキルでのあれこれ");
		$this->smarty->assign('sub_title' , "スキルに関するトピック");
		$this->smarty->assign('sub_text' , "自分のやれることなどをまとめたもの");

		$csv    = $this->di->get('csv' , array('CsvData'));
		$top_topic_data = $csv->get( "develop/skill/skill_sheet");

		foreach( $top_topic_data as &$data){
			$data['link'] = "/devSkillTop/topic/?id={$data['id']}";
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

















