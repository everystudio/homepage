<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * ログイン
 */
class MailController extends Controllers\Base
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
        
        $link['mypage'] = "/mypage";

        $link['submit']  = "./login/check";
        $link['foreget'] = "./login/remind";
        $link['newcomer']= "./login/password";
        

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function check() {

        // 設定ファイル読み込み
        $smarty = $this->di->get('smarty');
        $dbh = $this->di->get('dbh');

        $use_dbh = $dbh['user_official'];

        // エラーメッセージ
        $errorMessage = "";

        // ここは開発用のデフォルト値
        /*
        $_POST["login"] = 1;
        $_POST["userid"] = "test@taison-inc";
        $_POST["pass"] = "taisonpass";
        */

        var_dump($_POST);

        $identify = $_POST['form_1'];       // ユーザーが入力したID
        $password = $_POST['form_2'];       // ユーザーが入力したパスワード

        // 画面に表示するため特殊文字をエスケープする
        $viewUserId = htmlspecialchars( $identify , ENT_QUOTES);

        // ログインボタンが押された場合      
        if (isset($_POST['button_01'])) {

                session_start();

                $sql = "select * from personalInfo where mail_address = :mail_address";
                $stmt = $use_dbh->prepare($sql);

                $stmt->bindParam(':mail_address',$identify,PDO::PARAM_STR);
                $ret = $stmt->execute();
                if( !$ret ){
                    throw new PDOException('select 失敗！');
                }
                else {
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo "{$result['id']}<br />";
                    echo "{$result['mail_address']}<br />";
                    echo "{$result['lastlogin']}<br />";

                    $user_password_salt = $result['password_salt'];
                    echo $user_password_salt;
                    echo "<br />";
                    $hashed = crypt($password , $user_password_salt );

                    if( $result['password_salt'] == $hashed ){
                        // セッションIDを新規に発行する
                        session_regenerate_id(TRUE);
                        $_SESSION["USERID"] = $identify;
                        header('Location: /mypage'); 
                    }
                    else {
                        echo "failed<br />";
                        $errorMessage = "ユーザIDあるいはパスワードに誤りがあります。";
                    }
                        //echo "{$hash}";

        //		foreach( $param in $ret){
                                //echo "{$param}";
        //		}

                        /*
                        // 認証成功
                        if ($_POST["userid"] == "hoge" && $_POST["password"] == "hoge") {
                                // セッションIDを新規に発行する
                                session_regenerate_id(TRUE);
                                $_SESSION["USERID"] = $_POST["userid"];
                                header("Location: ./mypage.php"); 
                                exit;
                        }
                        else {
                                $errorMessage = "ユーザIDあるいはパスワードに誤りがあります。";
                        }
                        */
                }
        }

        $link['submit']  = "./mypage/login";
        $link['foreget'] = "./mypage/login/remind";
        $link['newcomer']= "./mypage/input/password";
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function remind() {
        // 設定ファイル読み込み
        $smarty = $this->di->get('smarty');
        $config = $this->di->get('config');
        
        
        
        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
}





