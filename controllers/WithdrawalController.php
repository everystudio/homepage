<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * ポイント
 */
class WithdrawalController extends Controllers\Base
{
    public function __construct()
    {
        // 基底クラスの初期設定。controller配下では必ず呼び出す
        $this->initialize();
    }
    
    public function process() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $dbh = $this->di->get('dbh');
        $smarty = $this->di->get('smarty');
        
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function check() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        
        $link['password']  = "/mypage/withdrawal/password";
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function password() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        
        $link['delete']  = "/mypage/withdrawal/deleteDone";
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }

    /**
        削除を実行するところ
    */
    public function deleteDone(){
        $smarty = $this->di->get('smarty');

        $password = $_POST['password'];       // ユーザーが入力したID
        $password_confirm = $_POST['password_confirm'];       // ユーザーが入力したパスワード

        $input_facade = $this->di->get('facade', array("InputFacade"));

        $id = $_SESSION['ID'];
        $error = "";
        if( true == $input_facade->checkPassword( $id , $password , $password_confirm ,$error)){

            $dbh = $this->di->get('dbh');
            $use_dbh = $dbh['user_official'];

            $sql = "delete from personalInfo ";
            $sql.= "where id = :id ";

            $use_dbh->beginTransaction();
            $stmt = $use_dbh->prepare($sql);
            $stmt->bindParam(':id', $id ,PDO::PARAM_INT);
            try {
                $ret = $stmt->execute();
                if( !$ret ){
                    throw new PDOException('データの削除に失敗しました');
                }
                $use_dbh->commit();
                header('Location: /mypage/withdrawal/finished');
            }
            catch( PDOException $e ){
                $use_dbh->rollBack();
            }
        }
        else {
            $smarty->assign("error",$error);
            $smarty->assign("data" , $_POST);
            $this->password();
            exit;
        }

        ;// ここにきちゃだめ

        return;
    }
   

    public function finished() {

        // セッションを削除
        $_SESSION = array();
        session_destroy();

        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        
        $link['back']  = "/mypage/login";
        $link['mypage'] = "/mypage";
        $link['official_top'] = "/";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
}





