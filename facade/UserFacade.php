<?php


require_once __DIR__.'/Base.php';
/**
 * ユーザー情報に関する処理
 */
class UserFacade extends Facade\Base
{
    public function __construct($di)
    {
        // 基底クラスの初期設定。
        $this->initialize($di);
    }
    
    /**
     * spdungeonPointデータ取得
     * @param type $uid
     * @return $result
     */
    public function getSpdungeonPoint($uid) {
        $result = array();
        // 設定ファイル読み込み
        $appDbh = $this->di->get('appDbh');
        
        $sql = 'select * from spdungeonPoint where uid = :uid ORDER BY updatetime DESC';
        $stmt = $appDbh["event"]->prepare($sql);
        $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
        $ret = $stmt->execute();
        if (!$ret) {
            return false;
        }

        while($spdungeonPoint = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $spdungeonPoint;
        }
                    
        // 正常終了
        return $result;
        
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























