<?php


require_once __DIR__.'/Base.php';
/**
 * ユーザー情報に関する処理
 */
class AqbRecipeFacade extends Facade\Base
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
	public function addLink( &$recipe ) {

		for( $i = 1 ; $i <= 4 ; $i++ ){
			$item_name = $recipe['item'.$i];
			if( $item_name != "なし" ){
				$recipe['link'.$i] = "/gameAqb/elementDetail/?name={$item_name}";
			}
		}
		return;
	}

	/**
	* 最新のspdungeonPointデータ
	* @param type $uid
	* @return $spdungeonPoint
	*/
	public function getLastSpdungeonPoint($uid) {
		$spdungeonPoint = array();
		// 設定ファイル読み込み
		$appDbh = $this->di->get('appDbh');

		$sql = 'select * from spdungeonPoint where uid = :uid ORDER BY updatetime DESC';
		$stmt = $appDbh["event"]->prepare($sql);
		$stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
		$ret = $stmt->execute();
		if (!$ret) {
		return false;
		}

		$spdungeonPoint = $stmt->fetch(PDO::FETCH_ASSOC);

		// 正常終了
		return $spdungeonPoint;

	}

}























