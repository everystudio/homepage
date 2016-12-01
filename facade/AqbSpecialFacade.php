<?php


require_once __DIR__.'/Base.php';
/**
 * ユーザー情報に関する処理
 */
class AqbSpecialFacade extends Facade\Base
{
	public function __construct($di)
	{
		// 基底クラスの初期設定。
		$this->initialize($di);
	}

	/**
	* レシピデータに素材詳細のリンクをくっつける
	* @param type $uid
	* @return $result
	*/
	public function addLink( &$special ) {

		$name = $special['name'];
		$special['link'] = "/gameAqb/specialDetail/?name={$name}";

		for( $i = 1 ; $i <= 2 ; $i++ ){
			$item_name = $special['combi'.$i];
			if( $item_name != "なし" ){
				$special['link'.$i] = "/gameAqb/specialDetail/?name={$item_name}";
			}
		}
		return;
	}

}























