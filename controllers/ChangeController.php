<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * パスワード変更
 */
class ChangeController extends Controllers\Base
{
    
    public $is_error;
    public $error_list;

    public function __construct()
    {
        // 基底クラスの初期設定。controller配下では必ず呼び出す
        $this->initialize();

        $this->is_error = false;
        $this->error_list = array();
    }

    public function index(){
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        
        $link['password'] = "/mypage/change/password";
        $link['mail'] = "/mypage/change/mail";
        $link['mypage'] = "/mypage";

        $smarty->assign( 'link' , $link );

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function test(){
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        
        $link['password'] = "/mypage/change/password";
        $link['mail'] = "/mypage/change/mail";
        $link['mypage'] = "/mypage";

        $smarty->assign( 'link' , $link );

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function password() {

        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        $dbh = $this->di->get('dbh');
        
        $link['change'] = "/mypage/change/passwordChange";
        $link['mypage'] = "/mypage";
        $link['back']="/mypage/change";

        $smarty->assign('link' , $link);

        $smarty->assign("is_error" , $this->is_error);
        $smarty->assign("error_list" , $this->error_list);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }

    public function passwordChange(){
        //var_dump($_POST);

        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');

        $password_now = $_POST['password_now'];       // ユーザーが入力したパスワード
        $password_new = $_POST['password_new'];       // ユーザーが入力したパスワード
        $password_new_confirm = $_POST['password_new_confirm'];       // ユーザーが入力したパスワード

        if( empty($password_now) ){
            $this->is_error = true;
            $this->error_list['password_now'] = "現在のパスワードが入力されていません";
        } else if( strlen($password_now)< 8 ){
            $this->is_error = true;
            $this->error_list['password_now'] = "8文字以上でお願いいたします";
        } else if(!preg_match('/^[a-zA-Z0-9]+$/', $password_now)){
            $this->is_error = true;
            $this->error_list['password_now'] = "半角英数字でないものが含まれています";
        }

        if( empty($password_new) ){
            $this->is_error = true;
            $this->error_list['password_new'] = "新しいパスワードが入力されていません";
        } else if( strlen($password_new)< 8 ){
            $this->is_error = true;
            $this->error_list['password_new'] = "8文字以上でお願いいたします";
        } else if(!preg_match('/^[a-zA-Z0-9]+$/', $password_new)){
            $this->is_error = true;
            $this->error_list['password_new'] = "半角英数字でないものが含まれています";
        }

        if( empty($password_new_confirm) ){
            $this->is_error = true;
            $this->error_list['password_new_confirm'] = "確認用の新しいパスワードが入力されていません";
        } else if( strlen($password_new_confirm)< 8 ){
            $this->is_error = true;
            $this->error_list['password_new_confirm'] = "8文字以上でお願いいたします";
        } else if(!preg_match('/^[a-zA-Z0-9]+$/', $password_new_confirm)){
            $this->is_error = true;
            $this->error_list['password_new_confirm'] = "半角英数字でないものが含まれています";
        }

        if( $password_new != $password_new_confirm ){
            $this->is_error = true;
            $this->error_list['password_new_mismatch'] = "新しいパスワードと確認用のパスワードが一致しません";
        }

        if( $this->is_error ){
            $smarty->assign("is_error" , $this->is_error);
            $smarty->assign("error_list" , $this->error_list);
            $smarty->assign("data" , $_POST);
            $this->password();
            exit;
        }

        $dbh = $this->di->get('dbh');
        $use_dbh = $dbh['user_official'];

        $sql = "select * from personalInfo where id = :id";
        $stmt = $use_dbh->prepare($sql);

        $stmt->bindParam(':id' , $_SESSION["ID"] , PDO::PARAM_STR);
        $ret = $stmt->execute();
        if( !$ret ){
            throw new PDOException('select 失敗！');
        }
        else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $user_password_salt = $result['password_salt'];
            $hashed = crypt( $password_now , $user_password_salt );

            if( $hashed == $user_password_salt ){
                ;// 一致してるのでOK
            }
            else {
                $this->is_error = true;
                $this->error_list['password_now'] = "パスワードが違います";
                $smarty->assign("data" , $_POST);
                $this->password();

                // パスワード入力画面を表示させてからぬける
                exit;
            }

        }

        $hashed_new = crypt( $password_new );
        $sql = "update personalInfo set ";
        $sql.= "password_salt = :password_salt ";
        $sql.= "where id = :id ";
        $use_dbh->beginTransaction();
        $stmt = $use_dbh->prepare($sql);

        $stmt->bindParam(':password_salt' , $hashed_new , PDO::PARAM_STR);
        $stmt->bindParam(':id',$_SESSION['ID'],PDO::PARAM_INT);
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
        header('Location: /mypage/change/passwordFinished'); 
    }
    
    public function passwordFinished() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        
        $link['mypage'] = "/mypage";
        $link['back']="/mypage/change";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }

    public function mail(){
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');

        $link['send'] = "/mypage/change/mailSend";
        $link['mypage']="/mypage";
        $link['back']="/mypage/change";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }

    public function mailSend(){
        $test = 0;

        mb_internal_encoding("UTF-8");

        $smarty = $this->di->get('smarty');

        $mail_address = $_POST['mail_address_new'];       // ユーザーが入力したID

        $inputFacade = $this->di->get('facade', array("InputFacade"));

        echo "<br />";
        echo $test++ . "<br />";
        echo "<br />";

        $error_message = "";
        if( false == $inputFacade->checkUserMail($mail_address , &$error_message )){
            $smarty->assign('error_message' , $error_message);

            echo $error_message;
            $this->mail();
            exit;
        }

        echo "<br />";
        echo $test++ . "<br />";
        echo "<br />";
        // 確認用に使うトークンをここで発行
        $token = $inputFacade->get_csrf_token();
        $password = "abcd1234";

        // 変更しようとするメールアドレスを持っているかどうかのチェック
        $have_change_mail_data = $inputFacade->isNewMailData($_SESSION['ID']);

        $time_facade = $this->di->get('facade', array("TimeFacade"));
        $createtime = $time_facade->getNow("Y-m-d H:i:s");

        echo "bbb<br />";
        echo $test++ . "<br />";
        echo "<br />";
        echo $createtime;
        echo "<br />";
        echo "<br />";

        // データベース使うぜぇ
        $dbh = $this->di->get('dbh');
        $use_dbh = $dbh['user_official'];

        echo "aa<br />";
        echo $test++ . "<br />";
        echo "<br />";

        if( $have_change_mail_data ){

echo "have<br />";
echo $test++ . "<br />";
echo "<br />";
exit;

            // 持ってるから更新
            $sql = "update changeMail set ";
            $sql.= "mail_address_new = :mail_address_new ,";
            $sql.= "token = :token ,";
            $sql.= "password= :password ,";
            $sql.= "createtime = :createtime ";
            $sql.= "where id = :id ";
            $use_dbh->beginTransaction();
            $stmt = $use_dbh->prepare($sql);

            $stmt->bindParam(':mail_address_new' , $mail_address , PDO::PARAM_STR);
            $stmt->bindParam(':token' , $token , PDO::PARAM_STR);
            $stmt->bindParam(':password' , $password , PDO::PARAM_STR);
            $stmt->bindParam(':createtime' , $createtime , PDO::PARAM_STR);
            $stmt->bindParam(':id',$_SESSION['ID'],PDO::PARAM_INT);
            try {
                $ret = $stmt->execute();
                if(!$ret){
                    throw new PDOException('メールアドレス変更用データ更新に失敗');
                    $this->dlog->log(print_r($stmt->errorInfo(),true));
                    $this->dlog->log(print_r($e->getMessage(),true));

                }
                $use_dbh->commit();

            }
            catch (PDOException $e) {
                $use_dbh->rollBack();
                $this->dlog->log(print_r($stmt->errorInfo(),true));
                $this->dlog->log(print_r($e->getMessage(),true));

                die(mb_convert_encoding($e->getMessage(), 'UTF-8','auto'));
                // 失敗用のページに飛ばなきゃですね
            }

        }
        else {
            // 持ってないものは作る
echo "dont have<br />";
echo $test++ . "<br />";
echo "<br />";
//exit;

            echo "<br />";
            echo "<br />";
            $sql = "insert into changeMail ";
            $sql.= "(id,mail_address_new,token,password,createtime) ";
            $sql.= "values(:id,:mail_address_new,:token,:password,:createtime)";
            $use_dbh->beginTransaction();
            $stmt = $use_dbh->prepare($sql);


            $stmt->bindParam(':id',$_SESSION['ID'],PDO::PARAM_INT);
            $stmt->bindParam(':mail_address_new' , $mail_address , PDO::PARAM_STR);
            $stmt->bindParam(':token' , $token , PDO::PARAM_STR);
            $stmt->bindParam(':password' , $password , PDO::PARAM_STR);
            $stmt->bindParam(':createtime' , $createtime , PDO::PARAM_STR);

            echo $_SESSION['ID'] . "<br />";
            echo $mail_address . "<br />";
            echo $token ."<br />";
            echo $password."<br />";
            echo $createtime ."<br />";
            echo "<br />";
            echo "<br />";


            try {
                $ret = $stmt->execute();
                echo $sql . "<br />";
                echo "実行<br />";
                echo "<br />";
                if(!$ret){
                    throw new PDOException('メールアドレス変更用データ作成に失敗');
                    $this->dlog->log(print_r($stmt->errorInfo(),true));
                    $this->dlog->log(print_r($e->getMessage(),true));
                }
                $use_dbh->commit();
                echo "<br />";
                echo "コミット<br />";
                echo "<br />";

            }
            catch (PDOException $e) {
                $use_dbh->rollBack();
                $this->dlog->log(print_r($stmt->errorInfo(),true));
                $this->dlog->log(print_r($e->getMessage(),true));
                echo "<br />";
                echo "ロールバック<br />";
                echo "<br />";

                die(mb_convert_encoding($e->getMessage(), 'UTF-8','auto'));
                // 失敗用のページに飛ばなきゃですね
            }

        }


        $url = 'http://'.$_SERVER['HTTP_HOST'].'/mypage/mailChange/?t='.$token;

        $limit = date("Y年m月d日 H:i",strtotime("1 hour"));

        $subject = "☆パズルキングダム☆ご登録確認のお手続きについて";

        $message = <<<EOF

{$mail_address}様

このたびはパズルキングダムをご利用いただき、誠にありがとうございます。
登録を完了するために、下記のリンクをクリックしてください。

[リンク]
{$url}

◆クリック有効時間
{$limit}　まで

※クリック後に完了ページが表示された時点で、【登録完了】となります。

お客様の登録を心よりお待ちしております。

■注意点について
クリック有効時間を過ぎますと、ご登録をお受けすることができません。
ご利用のメールソフトから直接クリックできない場合は、URL全体を
コピーしてブラウザのアドレスバーに貼り付けてお進みください。
またURLをコピーする際は、空白や改行を含まないようご注意ください。

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
このメールにお心当たりがない場合は、他の方が誤ってお客様のメールアドレスを入力した可能性があります。その場合は何もおこなわずに、このメールを破棄してください。
今後は当社より継続的にメールが送信されることは一切ございません。
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

※本メールは送信専用メールアドレスからお送りしています。
返信いただいてもご回答することができません。
お問い合わせは、以下の専用窓口からお願いいたします。

──────────────
【お問い合わせ先】
タイソン株式会社　お問い合わせ専用窓口
e-mail：[窓口メールアドレス]@taison-inc.com
──────────────
EOF;

        $mailret = mail(
            $mail_address ,
            mb_encode_mimeheader($subject, 'ISO-2022-JP-MS'),          //エンコードはISO-2022-JP-MSで行う！
            mb_convert_encoding($message, 'ISO-2022-JP-MS'),            //エンコードはISO-2022-JP-MSで行う！
            "Content-Type: text/html; charset=\"ISO-2022-JP\";\n"     //ヘッダはISO-2022-JPを指定する！
        );        

        if($mailret){
            $_SESSION['send_mail_new'] = "change_mail_address_new";
            $_SESSION['mail_address_new'] = $mail_address;
            $_SESSION['token_cm'] = $token;
            exit;
            header('Location: /mypage/change/mailFinished'); 
        }
        else {
            header('Location: /mypage/change/mailFail'); 
        }
        exit;
    }

    public function mailSended(){
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');

        $link['mypage']="/mypage";
        $link['mail_change']="/mypage/change/mailChange";
        $link['back']="/mypage/change";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }

    public function mailChange(){

        $goto_top = false;

        if(!isset($_SESSION['token_cm'])){
            // そもそもトークンがない
            $goto_top = true;
        }
        else if(!isset($_GET['t'])){
            $goto_top = true;
        }
        else if( isset($_SESSION['token_cm']) != isset($_GET['t']) ){
            $goto_top = true;
        }
        else {
            ;// 大丈夫そう
        }

        if( $_SESSION['token_s'] != $_GET['t']){
            $goto_top = true;
        }

        if( !isset($_SESSION['send_mail_new'])){
            $goto_top = true;
        }
        else if( !isset($_SESSION['mail_address_new'])){
            $goto_top = true;
        }
        else if( !isset($_SESSION['token_cs'])){
            $goto_top = true;
        }
        else {
        }

        $inputFacade = $this->di->get('facade', array("InputFacade"));

        // このタイミングでメールアドレスの登録ができるかのチェック
        if( false == $inputFacade->checkUserMail( $mail_address_new )){
            $goto_top = true;
        }

        if( $goto_top == true ){
            $_SESSION['send_mail_new'] = "";
            $_SESSION['mail_address_new'] = "";
            $_SESSION['token_cs'] = "";
            header('Location: /mypage');
        }

        // よさそうなのでメールアドレス変更書き込む
        $dbh = $this->di->get('dbh');
        $use_dbh = $dbh['user_official'];

        $sql = "update personalInfo set ";
        $sql.= "mail_address = :mail_address ";
        $sql.= "where id = :id ";
        $use_dbh->beginTransaction();
        $stmt = $use_dbh->prepare($sql);

        $stmt->bindParam(':mail_address' , $mail_address_new , PDO::PARAM_STR);
        $stmt->bindParam(':id',$_SESSION['ID'],PDO::PARAM_INT);
        try {
            $ret = $stmt->execute();
            if(!$ret){
                throw new PDOException('メールアドレスの変更に失敗しました');
            }
            $use_dbh->commit();
        }
        catch (PDOException $e) {
            $use_dbh->rollBack();
            die(mb_convert_encoding($e->getMessage(), 'UTF-8','auto'));
            // 失敗用のページに飛ばなきゃですね
        }        

        // ここにメールを送る所為r追加
        header('Location: /mypage/change/mailFinished'); 
        exit;
    }

    public function mailFinished() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');

        $link['mypage']="/mypage";
        $link['back']="/mypage/change";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }



}





