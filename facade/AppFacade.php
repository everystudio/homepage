<?php


require_once __DIR__.'/Base.php';
/**
 * アプリに関する処理
 */
class AppFacade extends Facade\Base
{
    public function __construct($di)
    {
        // 基底クラスの初期設定。
        $this->initialize($di);
    }
    
    // jsonデータ取得
    public function getJsonData() {
        $data = null;
        // jsonデータ取得
        $json_string = file_get_contents('php://input');
        $data = json_decode($json_string, true);

        return $data;
    }
}

