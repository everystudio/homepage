<?php


date_default_timezone_set('Asia/Tokyo');

$DIR_ROOT = __DIR__;
$param = preg_replace( '/\/$/', '', $_SERVER['REQUEST_URI'] );
//$param = strtolower( preg_replace( '/\/?$/', '', $param ) );
$params = array();
if ( !empty( $param ) ) {
    // パラメーターを / で分割
    $params = explode( '/', $param );
    $params = array_merge(array_diff($params, array('')));
    // ルートディレクトリは消す
    if ( '/'.$params[0] == $DIR_ROOT ) {
        array_shift( $params );
    }
    /*
    // mypageは省略
    if ( $params[0] == 'mypage' ) {
        array_shift( $params );
    }
    */
}


// 1番目のパラメーターをコントローラーとして取得
$controller = ( !empty( $params[0] ) ) ? $params[0] : 'top';
// 2番目のパラメータをメソッドとして取得
$methodName = ( !empty( $params[1] ) ) ? $params[1] : 'index';

/**
    これでセッションが使えるようになるらしい
*/
session_start();

//$_GET["uid"] = 1;
//$_GET["chk_sum"] = "4ec8427d87bfa96a33fedbfff6da57137572248ab8b936a5d5cb266d58da05dd";
//$_GET["uid"] = 2;
//$_GET["chk_sum"] = "1f2e381f05140c43211c4d259c38f30e6a73a3865a2955874ed5d855967c64a3";
if( isset($_GET["uid"]) && isset($_GET["chk"])){
    $_SESSION['uid'] = $_GET["uid"];
    $_SESSION['chk'] = $_GET["chk"];
}
//if(empty($_SESSION['chk'])) $_SESSION['chk'] = isset($_GET["chk"]) ? $_GET["chk"] : null;
/*
$goto_login = 0;
if( !isset($_SESSION['login'])){
    // ログインコントローラーとインプットコントローラーはいつでも入れる
    if( ($controller == 'login' )){
    }
    else if( $controller == 'input'){
    }
    else if( $controller == 'error'){
    }
    else if(empty($_SESSION["chk_auto_login"]) && !empty($_COOKIE['alk']) && !empty($_COOKIE['i'])){
        $_SESSION["chk_auto_login"] = true;
        header('Location: /mypage/login'); 
    }
    else {
        $goto_login = 1;
    }
}

// 条件にひっかかったのでログインページヘご案内(かつゲーム側からのAPI通信ではない)
if( $goto_login && $controller != "app"){
    $controller = 'login';
    $methodName = 'index';
}
*/
// パラメータより取得したコントローラー名によりクラス振分け
$controller = ucfirst( $controller ); // 先頭の文字を大文字に変換

//echo $controller;
$classFile = $controller.'Controller.php';
$className = $controller.'Controller';

// モデルも読み込む
//$modelFile = $controller.'.php';

if ( !is_file( $DIR_ROOT.'/controllers/'.$classFile ) ) {
    header("HTTP/1.0 404 Not Found");
    exit;
}
// クラスファイル読込
require_once( $DIR_ROOT.'/controllers/'.$classFile );
/*if ( is_file( $DOCUMENT_ROOT.'./models/'.$modelFile ) ) {
    require_once( $DOCUMENT_ROOT.'./models/'.$modelFile );
}*/
// インスタンス化したいクラスを引数で渡す
$c = new ReflectionClass( /*"Controllers\\".*/$className );
// インスタンス化
$obj = $c->newInstance();
// メソッドを取得
if ( !$c->hasMethod( $methodName ) ) {
    header("HTTP/1.0 404 Not Found");
    exit;
}

$method = $c->getMethod( $methodName );
// メソッドを起動
$return = $method->invoke( $obj );
if(!empty($return)){
    // ここまでくる場合はAPI仕様
    header("Content-Type:text/javascript; charset=utf-8");// for debug
    echo json_encode($return);
    exit; 
}

?>
