<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * マイページトップ
 */
class ErrorController extends Controllers\Base
{
    public $ErrorList = array(
        0 => "エラーが発生しました。\n\n以下「ログインフォーム」ボタンを押して、再度ログインをお試しください。",
        1 => "ユーザIDあるいはパスワードに誤りがあります。\n\n以下「ログイン画面」ボタンを押して、再度ログインをお試しください。",
    );

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

        $link['official_top']       = "/";
        $link['mypage']             = "/mypage/top";

        $error_message = $this->ErrorList[0];
        if (isset($_GET['error_code']) && is_numeric($_GET['error_code'])) {
            $error_code = $_GET['error_code'];
            if (isset($this->ErrorList[$error_code])) {
                $error_message = $this->ErrorList[$error_code];
            }
        }

        $smarty->assign('link' , $link);
        $smarty->assign('error_message' , $error_message);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
}





