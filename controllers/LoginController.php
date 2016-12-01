<?php

//namespace Controllers;

//require_once __DIR__.'/Base.php';
require_once __DIR__.'/InputBaseController.php';
/**
 * ログイン
 */
class LoginController extends InputBaseController
{
    public $secret_question;
    public $secret_answer;

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

        $login_facade = $this->di->get('facade', array("LoginFacade"));

        $use_dbh = $dbh['user_official'];

        //自動ログインチェック
        if (!empty($_COOKIE['alk']) && !empty($_COOKIE['i'])) {
            $result = $login_facade->getUserInfo($use_dbh,$_COOKIE['i']);
            if( !$result ){
                //クッキー削除
                $login_facade->deleteAutoLoginCookie();
            } else if (isset($result["auto_login_key"]) && $result["auto_login_key"] == $_COOKIE["alk"]) {
                //自動ログイン再生成
                $login_facade->createAutoLoginKey($use_dbh,$result["id"]);

                // セッションIDを新規に発行する
                session_regenerate_id(TRUE);
                $_SESSION["ID"] = $result['id'];
                $_SESSION['login'] = $result['id'];

                // この情報は合ったとしたら破棄
                $_SESSION['send_mail'] = "";
                $_SESSION['mail_address'] = "";

                header('Location: /mypage'); 
                exit;
            }
        } else {
            //クッキー削除
            $login_facade->deleteAutoLoginCookie();
        }

        $link['mypage'] = "/mypage";
        $link['submit']  = '/mypage/login/check';
        $link['foreget'] = "/mypage/login/remind";
        $link['newcomer']= "/mypage/input/mail";
        
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

        $login_facade = $this->di->get('facade', array("LoginFacade"));

        $use_dbh = $dbh['user_official'];

        // エラーメッセージ
        $errorMessage = "";

        // ここは開発用のデフォルト値
        /*
        $_POST["login"] = 1;
        $_POST["userid"] = "test@taison-inc";
        $_POST["pass"] = "taisonpass";
        */

        // var_dump($_POST);

        $identify = $_POST['form_1'];       // ユーザーが入力したID
        $password = $_POST['form_2'];       // ユーザーが入力したパスワード
        //$password = 'taisonpass';

        // 画面に表示するため特殊文字をエスケープする
        $viewUserId = htmlspecialchars( $identify , ENT_QUOTES);

        // ログインボタンが押された場合以外ないので特に分岐無し(watan)      
        $sql = "select * from personalInfo where mail_address = :mail_address";
        $stmt = $use_dbh->prepare($sql);

        $stmt->bindParam(':mail_address',$identify,PDO::PARAM_STR);
        $ret = $stmt->execute();
        if( !$ret ){
            throw new PDOException('select 失敗！');
        }
        else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            // echo "{$result['id']}<br />";
            // echo "{$result['mail_address']}<br />";
            // echo "{$result['lastlogin']}<br />";

            $user_password_salt = $result['password_salt'];
            // echo $user_password_salt;
            // echo "<br />";
            // echo "<br />";
            // var_dump($result);
            // echo "<br />";
            $hashed = crypt( $password , $user_password_salt );


            if( $hashed == $user_password_salt){
            // echo "<br />";
            // echo "success!!back";
            // echo "<br />";

            }

            // echo "<br />";
            // echo "<br />";
            // echo $result['password_salt'];
            // echo "<br />";
            // echo $hashed;

            // echo "<br />";
            // echo "<br />";
            // echo "<br />";
            // echo "<br />";
            if( $result['password_salt'] == $hashed ){
                if (isset($_POST['login_check'])) {
                    //自動ログイン鍵更新
                    $login_facade->createAutoLoginKey($use_dbh,$result['id']);
                } else {
                    //ログイン時間更新
                    $login_facade->updateLastLogin($use_dbh,$result['id']);
                }

                // セッションIDを新規に発行する
                session_regenerate_id(TRUE);
                $_SESSION["ID"] = $result['id'];
                $_SESSION['login'] = $result['id'];

                // この情報は合ったとしたら破棄
                $_SESSION['send_mail'] = "";
                $_SESSION['mail_address'] = "";

                header('Location: /mypage'); 
                exit;

            }
            else {
                header('Location: /mypage/error/index/?error_code=1'); 
            }
        }
    }
    
    public function remind() {
        // 設定ファイル読み込み
        $smarty = $this->di->get('smarty');
        $config = $this->di->get('config');

        // 秘密の質問のプレセットを呼び出してパラメータをセット
        $this->preset($smarty);

        $link['submit'] = "/mypage/login/remindCheck";
        $link['mypage'] = "/mypage";
        
        $smarty->assign('link' , $link);
        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }

    public function remindCheck(){
        // 設定ファイル読み込み
        $smarty = $this->di->get('smarty');
        $dbh = $this->di->get('dbh');

        $use_dbh = $dbh['user_official'];

        $mail_address       = $_POST['mail_address'];
        $secret_question    = $_POST['secret_question'];
        $secret_answer      = $_POST['secret_answer'];

        $sql = "select * from personalInfo where mail_address = :mail_address";
        $stmt = $use_dbh->prepare($sql);

        $stmt->bindParam(':mail_address',$mail_address,PDO::PARAM_STR);
        $ret = $stmt->execute();
        if( !$ret ){
            throw new PDOException('select 失敗！');
        }
        else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($result);
        }

        $is_ok = false;
        if( $result['secret_question'] == $secret_question ){
            if( $result['secret_answer'] == $secret_answer ){
                $is_ok = true;
            }
        }

        if( $is_ok ){
            $_SESSION['remind_in'] = 1;
            $_SESSION['remind_mail_address'] = $mail_address;
            header('Location: /mypage/login/redefine');
            exit;
        }
        else {
            header('Location: /mypage/login/remind');
            exit;
        }
        return;
    }

    public function redefine() {

        if( !$this->is_environment()){
            if( isset($_SESSION['login']) && ($_SESSION['login'] != 0 )){
                echo "ログインしている人は入れません";
                // エラーページへ飛ばす
                exit;
            }
        }

        if( isset($_SESSION['remind_in']) && 0 < $_SESSION['remind_in']){
            ;// ok
            // リマインドで入ってきて
            // パラメータが正の数の場合ゆるされる
        }
        else {
            echo "<br />リマインダーでログインしてください";
            // エラーページへ飛ばす
            exit;
        }

        // 設定ファイル読み込み
        $smarty = $this->di->get('smarty');
        $config = $this->di->get('config');

        // パスワードのやりとりが発生するけど、保存するもんでもないなぁ

        $link['submit'] = "/mypage/login/redefineDone";
        $link['mypage']  = "/mypage";//ま、ログインページに飛ばされるだろうけど
        $smarty->assign('link' , $link);
     
        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }

    public function redefineDone(){
        // 設定ファイル読み込み
        $smarty = $this->di->get('smarty');
        $dbh = $this->di->get('dbh');

        $use_dbh = $dbh['user_official'];

        $mail_address           = $_POST['mail_address'];
        $password_new           = $_POST['password_new'];
        $password_new_confirm   = $_POST['password_new_confirm'];

        $temp_error_msg = "";
        $input_facade = $this->di->get('facade', array("InputFacade"));
        if( !$input_facade->checkPasswordFormat($password_new , 8 , $temp_error_msg )){
            $smarty->assign("is_error",1);
            $smarty->assign("error_msg","パスワードは英数字8文字以上です");
            $this->redefine();
            exit;
        }

        if( $password_new != $password_new_confirm ){
            $smarty->assign("is_error",1);
            $smarty->assign("error_msg","パスワードと確認用のパスワードが一致しません");
            $this->redefine();
            exit;
        }

        // パスワード変更しまっせ
        $mail_address = $_SESSION['remind_mail_address'];

        $hashed_new = crypt( $password_new );
        $sql = "update personalInfo set ";
        $sql.= "password_salt = :password_salt ";
        $sql.= "where mail_address = :mail_address ";
        $use_dbh->beginTransaction();
        $stmt = $use_dbh->prepare($sql);

        $stmt->bindParam(':password_salt' , $hashed_new , PDO::PARAM_STR);
        $stmt->bindParam(':mail_address',$mail_address,PDO::PARAM_STR);
        try {
            $ret = $stmt->execute();
            if(!$ret){
                throw new PDOException('パスワードの更新に失敗しました');
            }
            $use_dbh->commit();

        }
        catch (PDOException $e) {
            $use_dbh->rollBack();
            die(mb_convert_encoding($e->getMessage(), 'UTF-8','auto'));
            // 失敗用のページに飛ばなきゃですね
        }

        // 正常ならここまでくる
        header('Location: /mypage/login/finishedRedefine'); 
    }

    public function finishedRedefine() {
        // 設定ファイル読み込み
        $smarty = $this->di->get('smarty');
        $config = $this->di->get('config');

        $link['mypage'] = "/mypage/";
        $link['login'] = "/mypage/login";
        $smarty->assign('link' , $link);
     
        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
        public function finishedremind() {
        // 設定ファイル読み込み
        $smarty = $this->di->get('smarty');
        $config = $this->di->get('config');
     
        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
}









