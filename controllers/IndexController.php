<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * マイページトップ
 */
class IndexController extends Controllers\Base
{
    public function __construct()
    {
        // 基底クラスの初期設定。controller配下では必ず呼び出す
        $this->initialize();
    }
    
    public function index() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $dbh = $this->di->get('dbh');
        $smarty = $this->di->get('smarty');

        $link['apply_condition']	= "/mypage/apply/condition";
        $link['apply_result'] 		= "/mypage/apply/result";
        $link['point_history']		= "/mypage/point/history";
        $link['point_limit']		= "/mypage/point/limit";
        $link['prize_history']		= "/mypage/prize/history";
        $link['edit_profile']		= "/mypage/edit/input_password";
        $link['reset_password']		= "/mypage/change/password";
        $link['withdrawal']		= "/mypage/withdrawal/check";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        //$dir = strtolower(str_replace("Controller", "", get_class($this)));
        $dir = "top";
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
}





