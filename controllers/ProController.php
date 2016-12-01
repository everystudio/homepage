<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * ポイント
 */
class ProController extends Controllers\Base
{
    public function __construct()
    {
        // 基底クラスの初期設定。controller配下では必ず呼び出す
        $this->initialize();
    }
    
    public function regist() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $dbh = $this->di->get('dbh');
        $smarty = $this->di->get('smarty');
        
        $link['check']  = "/mypage/pro/registCheck.php";
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function registCheck() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        
        $link['prize_detail'] = "/mypage/prize/historyDetail.php";
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function registFinish() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
}





