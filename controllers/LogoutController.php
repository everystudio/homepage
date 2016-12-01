<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * ログアウト
 */
class LogoutController extends Controllers\Base
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
        
        $link['submit']  = "./logout/exec";
        $link['foreget'] = "/mypage/login/remind";
        $link['newcomer']= "/mypage/input/password";
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        var_dump($_SESSION);

        var_dump($_COOKIE);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    /**
        ログアウトする処理
        ログアウト後はログアウトしましたよページに移動
    */
    public function exec() {
        // セッション情報をなくす(削除はできないのでご注意)
        $_SESSION = array();
        session_destroy();
        //クッキー削除
        if (isset($_COOKIE['i'])) {
            unset($_COOKIE['i']);
            setcookie("i","", time() - 1800,"/mypage");
        }
        if (isset($_COOKIE['alk'])) {
            unset($_COOKIE['alk']);
            setcookie("alk","", time() - 1800,"/mypage");
        }
        $this->done();
        exit;
        //header('Location: /mypage/logout/done'); 
    }

    public function done(){
        // 設定ファイル読み込み
        $_SESSION = array();
        session_destroy();

        $config = $this->di->get('config');
        $dbh = $this->di->get('dbh');
        $smarty = $this->di->get('smarty');

        $link['login']          = "/mypage/login";
        $link['mypage']         = "/mypage";
        $link['official_top']   = "/";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        $smarty->display($dir."/".__FUNCTION__.".html");

    }
}












