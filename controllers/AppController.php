<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * アプリからのAPI通信
 */
class AppController extends Controllers\Base
{
    public function __construct()
    {
        // 基底クラスの初期設定。controller配下では必ず呼び出す
        $this->initialize();
    }
    
    public function checkPersonal() {
        // jsonデータ取得
        $appfacade = $this->di->get('facade', array("AppFacade"));
        $data = $appfacade->getJsonData();
        $res = 0; // 初期値：会員未登録

        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $dbh = $this->di->get('dbh');

        try {
            $sql = 'select * from personalInfo where uid = :id';
            $stmt = $dbh["user_official"]->prepare($sql);
            $stmt->bindParam(':id', $data["uid"], PDO::PARAM_INT);
            $ret = $stmt->execute();
            if (!$ret) {
                throw new PDOException("dbError");
            }

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            // 登録済み
            if(!empty($result)) $res = 1;

        } catch (PDOException $e) {
            // 異常終了
            $res = false;
        }
        
        return array("res" => $res);

    }
}





