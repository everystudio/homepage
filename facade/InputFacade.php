<?php


require_once __DIR__.'/Base.php';
/**
 * 会員登録に関する処理
 */
class InputFacade extends Facade\Base
{
    public function __construct($di)
    {
        // 基底クラスの初期設定。
        $this->initialize($di);
    }
    
    /**
     * uidとsecret_codeが正しいかチェックする
     * @param type $appInfo
     * @return boolean
     */
    public function checkAppData($appInfo) {
        // 設定ファイル読み込み
        $appDbh = $this->di->get('appDbh');
        
        $sql = 'select * from userParam where uid = :uid';
        $stmt = $appDbh["user"]->prepare($sql);
        $stmt->bindParam(':uid', $appInfo["uid"], PDO::PARAM_INT);
        $ret = $stmt->execute();
        if (!$ret) {
            return false;
        }

        $userParam = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $accept = $this->di->get('facade', array("AcceptFacade"));
        $csv = $accept->getQuestionCode($userParam["id"]);
        
        $secret_code = $csv["qid"];
        
        // 秘密のコードが一致しない
        if($secret_code !== $appInfo["secret_code"]){
            return false;
        }
        
        // 正常終了
        return true;
        
    }

    public function isNewMailData($id){
        // 設定ファイル読み込み
        $dbh = $this->di->get('dbh');

        $sql = 'select count(*) from changeMail where id = :id ';
        $stmt = $dbh["user_official"]->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $ret = $stmt->execute();
        if (!$ret) {
            return false;
        }
        $result = $stmt->fetch(2);// PDO::FETCH_ASSOC=2



        return (0 < $result["count(*)"]);
    }
    
    public function checkMailData($uid, $mail_address) {
        // 設定ファイル読み込み
        $dbh = $this->di->get('dbh');

        $sql = 'select * from personalInfo where uid = :uid OR mail_address = :mail_address';
        $stmt = $dbh["user_official"]->prepare($sql);
        $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
        $stmt->bindParam(':mail_address', $mail_address, PDO::PARAM_STR);
        $ret = $stmt->execute();
        if (!$ret) {
            return false;
        }

        $personalInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // 既にuidかメールアドレスが登録されている
        if(!empty($personalInfo)){
            return false;
        }
        
        // 正常終了
        return true;
        
    }


    /**
        メールアドレスのフォーマットがあってるかどうかの確認用関数
    */
    public function checkMailFormat($mail_address , &$error_message){

        // エラー項目に引っかからなかったらOK
        $ret = true;

        $pattern = '/\A(?:(?:(?:(?:[a-zA-Z0-9_!#\$\%&\'*+\/=?\^`{}~|\-]+)(?:\.(?:[a-zA-Z0-9_!#\$\%&\'*+\/=?\^`{}~|\-]+))*)|(?:"(?:\\\\[^\r\n]|[^\\\\"])*")))\@(?:(?:(?:(?:[a-zA-Z0-9_!#\$\%&\'*+\/=?\^`{}~|\-]+)(?:\.(?:[a-zA-Z0-9_!#\$\%&\'*+\/=?\^`{}~|\-]+))*)|(?:\[[\x21-\x5a\x5e-\x7e]*\])))\z/';
        $error_message = "";
        if ($mail_address == "") {
            $error_message = "メールアドレスを入力してください";
            $ret = false;
        } 
        else if (!preg_match($pattern,$mail_address)) {
            $error_message = "メールアドレスの形式が正しくありません";
            $ret = false;
        }
        else {

        }
        return $ret;
    }

    /**
        入力されたのメールアドレスが登録できるかどうかのチェック
        true : とくにフォーマットも問題ないし、使ってるユーザーもいないからOK
        false: いかん、とにかくダメ！詳しくは$error_messageで！
    */
    public function checkUserMail($mail_address , &$error_message) {

        // メールのフォーマットがそもそもあってるかどうかのチェック
        if( false == $this->checkMailFormat($mail_address , $error_message) ){
            return false;
        }

        // 以下はメールの所有者がいるかどうかのチェック

        // 設定ファイル読み込み
        $dbh = $this->di->get('dbh');
        
        $sql = 'select * from personalInfo where mail_address = :mail_address';
        $stmt = $dbh["user_official"]->prepare($sql);
        $stmt->bindParam(':mail_address', $mail_address, PDO::PARAM_STR);
        $ret = $stmt->execute();
        if (!$ret) {
            $error_message = "メールデータの確認に失敗しました";
            return false;
        }

        $personalInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // 既にuidかメールアドレスが登録されている
        if(!empty($personalInfo)){
            $error_message = "既にメールアドレスが登録されています";
            return false;
        }
        
        // 正常終了
        return true;
    }

    /**
        ユーザーデータを取得する
    */
    public function read_user_info( $id ){
        //var_dump($di);
        $dbh = $this->di->get('dbh');
        $use_dbh = $dbh['user_official'];

        $sql = "select * from personalInfo where id = :id";
        $stmt = $use_dbh->prepare($sql);
        $stmt->bindParam(':id',$id,1);//PDO::PARAM_INT=1

        $ret = $stmt->execute();
        if( !$ret ){
            throw new PDOException('select 失敗！');
        }
        $result = $stmt->fetch(2);// PDO::FETCH_ASSOC=2

        return $result;
    }


    /**
        パスワードがフォーマットのルールにあっているかどうか
    */
    public function checkPasswordFormat( $password , $check_length , &$ret_message ){

        $ret = false;
        if(!empty($password)){
            // echo "koko<br />";
            if( strlen($password)<$check_length){
                $error_msg = "パスワードが8文字未満です";
            }
            else {
                if(preg_match('/^[a-zA-Z0-9]+$/', $password)){
                    // 半角英数字のみ(混ざってなくていいのか？)
                    // ここが正規ルート
                    $ret = true;
                }
                else {
                    // だめ
                    $error_msg = "半角英数字でないものが含まれています";
                }
            }
        }
        else {
            $error_msg = "パスワードが入力されていません";;
        }

        if( isset($ret_message)){
            $ret_message = $error_msg;
        }
        return $ret;
    }

    public function checkPassword( $id , $password , $password_confirm , &$ret_message){
        $ret = false;
        $error_msg = "";
        if( !$this->checkPasswordFormat($password , 8 , $ret_message )){
            return $ret;
        }
        else if( $password != $password_confirm ){
            $ret_message = "パスワードと確認用パスワードが一致しません";
            return $ret;
        }
        else {
            ;// 継続！
        }

        $dbh = $this->di->get('dbh');
        $use_dbh = $dbh['user_official'];
        $result = $this->read_user_info( $id );
        $password_salt = $result['password_salt'];

        // echo "<br>";
        // echo $password;
        // echo "<br>";
        // var_dump($result);
        // echo "<br>";

        $hashed = crypt( $password , $password_salt );

        // echo $hashed;
        // echo "<br>";

        if( $hashed == $password_salt ){
            $ret = true;
        }
        else {
            $ret_message = "パスワードが違います";
            $ret = false;
        }
        return $ret;
    }

    //32バイトのCSRFトークンを作成
    public function get_csrf_token() {
        $TOKEN_LENGTH = 16;//16*2=32バイト
        $bytes = openssl_random_pseudo_bytes($TOKEN_LENGTH);
        return bin2hex($bytes);
    }


}























