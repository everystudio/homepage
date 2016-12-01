<?php


require_once __DIR__.'/Base.php';
/**
 * 抽選に関する処理
 */
class LotFacade extends Facade\Base
{
    public function __construct($di)
    {
        // 基底クラスの初期設定。
        $this->initialize($di);
    }

    /**
     * 応募情報取得 応募ログテーブル出来たらそちらから取得
     * @param type $uid
     * @return type
     * @throws PDOException
     */
    public function getLogUserApply($uid){

        $result = array();
        // 設定ファイル読み込み
        $appDbh = $this->di->get('appDbh');
        
        $sql = "select * from userApplyLog where uid = :uid";
        $stmt = $appDbh["log"]->prepare($sql);
        $stmt->bindParam(':uid',$uid, PDO::PARAM_INT);

        $ret = $stmt->execute();
        if( !$ret ){
            return false;
        }
        
        while($userApplyLog = $stmt->fetch(PDO::FETCH_ASSOC)){
            $createtime = strtotime($userApplyLog["createtime"]);
            $userApplyLog["createtime"] = date( 'Y年m月d日', $createtime );
            $result[] = $userApplyLog;
        }

        return $result;
    }
    
    /**
     * 抽選データのCSVファイル名を取得する。
     * @param int $lot_id 抽選種別ID
     * @return string CSVファイル名
     */
    private function getPrizeCsvname($lot_id)
    {
        $lot_id = str_pad($lot_id, self::CSV_PAD_LENGTH, '0', STR_PAD_LEFT);
        $file_name = 'prize' . $lot_id . 'Data';
        
        return $file_name;
    }

    /**
        抽選に関わるデータを取得します
        関数名にlistついてないけど全件取得
    */
    public function getApplyData($uid){
        $result = array();

        // 設定ファイル読み込み
        $appDbh = $this->di->get('appDbh');
        $sql = 'select * from testUserApply where uid = :uid ORDER BY updatetime DESC';
        $stmt = $appDbh["event"]->prepare($sql);
        $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
        $ret = $stmt->execute();
        if (!$ret) {
            return false;
        }
        $time_facade = $this->di->get('facade', array("TimeFacade"));

        while($lotResultData = $stmt->fetch(PDO::FETCH_ASSOC)){
            $lotResultData['str_createtime'] = $time_facade->getFormat($lotResultData['createtime'] , 'Y年m月d日 H時i分' );
            $lotResultData['str_resulttime'] = $time_facade->getFormat($lotResultData['resulttime'] , 'Y年m月d日 H時i分' );
            $result[] = $lotResultData;
        }
        return $result;

    }

    public function getLotResult($uid){
        $result = array();

        // 設定ファイル読み込み
        $appDbh = $this->di->get('appDbh');
        $sql = 'select * from testLotResult where uid = :uid ORDER BY updatetime DESC';
        $stmt = $appDbh["event"]->prepare($sql);
        $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
        $ret = $stmt->execute();
        if (!$ret) {
            return false;
        }

        while($lotResultData = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $lotResultData;
        }
        return $result;
    }
    

}























