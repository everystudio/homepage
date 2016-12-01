<?php

//namespace Controllers;

//require_once __DIR__.'/Base.php';
require_once __DIR__.'/InputBaseController.php';
/**
 * ポイント
 */
class InputController extends InputBaseController
{
    public function __construct()
    {
        // 基底クラスの初期設定。controller配下では必ず呼び出す
        $this->initialize();

        $this->password_length = 8;
    }
    
    public function mail() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $dbh = $this->di->get('dbh');
        $smarty = $this->di->get('smarty');

        $link['submit']   = "/mypage/input/mailSend";
        $link['mypage'] = "/mypage";
        $link['policy'] = $this->is_environment() ? "/" : "/mypage/";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }

    public function mailSend(){

        mb_internal_encoding("UTF-8");

        $smarty = $this->di->get('smarty');

        $inputFacade = $this->di->get('facade', array("InputFacade"));

        $mail_address = $_POST['form_1'];       // ユーザーが入力したID
/*
        $pattern = '/\A(?:(?:(?:(?:[a-zA-Z0-9_!#\$\%&\'*+\/=?\^`{}~|\-]+)(?:\.(?:[a-zA-Z0-9_!#\$\%&\'*+\/=?\^`{}~|\-]+))*)|(?:"(?:\\\\[^\r\n]|[^\\\\"])*")))\@(?:(?:(?:(?:[a-zA-Z0-9_!#\$\%&\'*+\/=?\^`{}~|\-]+)(?:\.(?:[a-zA-Z0-9_!#\$\%&\'*+\/=?\^`{}~|\-]+))*)|(?:\[[\x21-\x5a\x5e-\x7e]*\])))\z/';
        $checkMailData = $inputFacade->checkUserMail($mail_address);

        $error_message = "";
        if ($mail_address == "") {
            $error_message = "メールアドレスを入力してください";
        } 
        else if (!preg_match($pattern,$mail_address)) {
            $error_message = "メールアドレスの形式が正しくありません";
        }
        else if($checkMailData !== true){
            $error_message = "既にメールアドレスが登録されています";
        }
        if ($error_message != "") {
        */

        $inputFacade = $this->di->get('facade', array("InputFacade"));
        // 大丈夫ならtrue エラーならfalse
        if( false == $inputFacade->checkMailFormat( $mail_address , &$error_message )) {
            $smarty->assign('error_message' , $error_message);
            $smarty->assign('mail_address',$mail_address);
            $this->mail();
            exit;
        }

        // echo $mail_address;
        $token = $inputFacade->get_csrf_token();

        $url = 'http://'.$_SERVER['HTTP_HOST'].'/mypage/input/registUid/?t='.$token;

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
            $_SESSION['send_mail'] = "sendmail";
            $_SESSION['mail_address'] = $mail_address;
            $_SESSION['token_s'] = $token;

            header('Location: /mypage/input/mailFinished'); 
        }
        else {
            header('Location: /mypage/input/mailFail'); 
        }
    }
    
    public function mailFinished() {
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
    
    public function info() {

        // var_dump($_POST);

        if( $this->is_environment()){
            ;// ローカル環境はトークンのチェックはしない
        }
        else {
            if( $_SESSION['token_s'] != $_SESSION['token_m'] ){
                header('Location: /mypage/'); 
            }
        }

        //var_dump($_POST);
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $dbh = $this->di->get('dbh');
        $smarty = $this->di->get('smarty');
        
        $appInfo = array("uid" => $_SESSION["uid"], "secret_code" => $_SESSION["secret_code"]);

        //$accept = $this->di->get('facade', array("AcceptFacade"));
        //$appInfo = $accept->checkRegist();

        $this->preset($smarty);
        $this->set_param($smarty, 0, $appInfo);
        
        $link['submit']   = "/mypage/input/infoCheck";
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function infoCheck() {

        // var_dump($_POST);

        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        
        $appInfo = array("uid" => $_POST["uid"], "secret_code" => $_POST["secret_code"]);

        $this->password_length = 8;     // なんかいい定義する場所ないんすかねぇ
        $this->preset($smarty);
        $this->set_param($smarty, 0, $appInfo);

        $this->is_error = $this->check_input();
        
        $inputFacade = $this->di->get('facade', array("InputFacade"));
        $checkMailData = $inputFacade->checkMailData($_POST["uid"], $_SESSION["mail_address"]);
        
        // 既にuidかメールアドレスが登録されている
        if($checkMailData !== true){
            $this->is_error = true;
            $this->error_list["checkMailData"] = "既にユーザーIDかメールアドレスが登録されています";
        }

        // var_dump($this->error_list);

        if( $this->is_error ){
            $smarty->assign( "is_error" , 1 );
            $smarty->assign('error_list' , $this->error_list);
            $this->info();
            exit;
        }
        // -----------------------------------------------

        $link['ok'] 	= "/mypage/input/infoFinished";
        $link['cancel'] = "/mypage/input/info";
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function infoFinished() {

        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        $link['mypage_top'] = "/mypage";
        $smarty->assign('link' , $link);
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");

        //var_dump($_POST);
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        $dbh = $this->di->get('dbh');

        $use_dbh = $dbh['user_official'];

        $appInfo = array("uid" => $_POST["uid"], "secret_code" => $_POST["secret_code"]);
        
        $this->password_length = 8;     // なんかいい定義する場所ないんすかねぇ
        $this->preset($smarty);
        $this->set_param($smarty, 0, $appInfo);
        
        $this->check_input();
        
        $inputFacade = $this->di->get('facade', array("InputFacade"));
        $checkAppData = $inputFacade->checkAppData($appInfo, 0, $appInfo);

        // uidもしくは秘密のコードがゲームに存在しない
        if($this->is_error || $checkAppData !== true){
            header('location: info');
            exit();
        }

        $use_dbh->beginTransaction();

        $password_salt = crypt($this->password_confirm);
        $birthday = $this->birth_year . '-' . $this->birth_month .'-' . $this->birth_day;

        $createtime = date("Y-m-d H:i:s");
        $updatetime = date("Y-m-d H:i:s");



        $sql = "insert into personalInfo ";
        $sql.= "(uid,mail_address,password_salt,family_name,family_name_furi,first_name,first_name_furi,sex,birthday,postalnumber,prefecture,municipality,address01,address02,address03,driver_license,secret_question,secret_answer,createtime,updatetime) ";
        $sql.= "values(:uid,:mail_address,:password_salt,:family_name,:family_name_furi,:first_name,:first_name_furi,:sex,:birthday,:postalnumber,:prefecture,:municipality,:address01,:address02,:address03,:driver_license,:secret_question,:secret_answer,:createtime,:updatetime)";

        $stmt = $use_dbh->prepare($sql);
        //echo $sql;
        //insert into personalInfo (password_salt,family_name,family_name_furi,sex,birthday,postalnumber,prefecture,municip2345 67,2,'?鸂','あお','’あmoriss03,driver_license,createtime) values('pass_salt','テスト','たろう',2,'2000-2-2',1234567',1,'青森市','あお','もり',2, '2014-10-07 12:23:34');
        $stmt->bindParam(':uid',$this->uid,PDO::PARAM_INT);
        $stmt->bindParam(':mail_address',$this->mail_address,PDO::PARAM_STR);
        $stmt->bindParam(':password_salt',$password_salt,PDO::PARAM_STR);
        $stmt->bindParam(':family_name',$this->family_name,PDO::PARAM_STR);
        $stmt->bindParam(':first_name',$this->name,PDO::PARAM_STR);
        $stmt->bindParam(':family_name_furi',$this->family_name_kana,PDO::PARAM_STR);
        $stmt->bindParam(':first_name_furi',$this->kana,PDO::PARAM_STR);
        $stmt->bindParam(':sex',$this->sex,PDO::PARAM_INT);
        $stmt->bindParam(':birthday',$birthday,PDO::PARAM_STR);
        $stmt->bindParam(':postalnumber',$this->postalnumber,PDO::PARAM_STR);
        $stmt->bindParam(':prefecture',$this->prefecture,PDO::PARAM_INT);
        $stmt->bindParam(':municipality',$this->municipality,PDO::PARAM_STR);
        $stmt->bindParam(':address01',$this->address01,PDO::PARAM_STR);
        $stmt->bindParam(':address02',$this->address02,PDO::PARAM_STR);
        $stmt->bindParam(':address03',$this->address03,PDO::PARAM_STR);
        $stmt->bindParam(':driver_license',$this->driver_license,PDO::PARAM_INT);
        $stmt->bindParam(':secret_question',$this->secret_question,PDO::PARAM_INT);
        $stmt->bindParam(':secret_answer',$this->secret_answer,PDO::PARAM_STR);
        $stmt->bindParam(':createtime',$createtime,PDO::PARAM_STR);
        $stmt->bindParam(':updatetime',$updatetime,PDO::PARAM_STR);

        try {
            $ret = $stmt->execute();

            if(!$ret){
                throw new PDOException('データの書き込みに失敗しました');
            }
            $use_dbh->commit();

        }
        catch (PDOException $e) {
            $use_dbh->rollBack();
            $this->dlog->log(print_r($stmt->errorInfo(),true));
            $this->dlog->log(print_r($e->getMessage(),true));
            header('location: /mypage/input/info');
            exit();

            // 失敗用のページに飛ばなきゃですね
        }

        header('location: /mypage/input/infoEnd');
        exit();

    }

    public function infoEnd(){
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名

        $link['login'] = "/mypage/login";
        $smarty->assign('link' , $link);

        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function password() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        
        $link['inputed'] = "/mypage/input/passwordFinished";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function passwordFinished() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        
        $link['input_info'] = "/mypage/input/info.php";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }


    public function registUid(){
        $smarty = $this->di->get('smarty');
        $config = $this->di->get('config');

        if( $_SESSION['token_s'] != $_GET['t'] ){
            header('location: /mypage');
        } else {
            $_SESSION['token_m'] = $_GET['t'];
        }

        
        $accept = $this->di->get('facade', array("AcceptFacade"));
        $appInfo = $accept->checkRegist();

        // 秘密の質問のプレセットを呼び出してパラメータをセット
        $this->preset($smarty);
        $this->set_param($smarty, 0, $appInfo);

        $link['submit'] = "/mypage/input/checkUid";
        $link['official_top']       = "/";
        $link['mypage'] = "/mypage";
        $smarty->assign('link' , $link);
        
        $smarty->assign('is_error' , $this->is_error);
        $smarty->assign('error_list',$this->error_list);


        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }

    public function checkUid(){

        $smarty = $this->di->get('smarty');
        $config = $this->di->get('config');

        $appInfo = array("uid" => $_POST["uid"], "secret_code" => $_POST["secret_code"]);
        
        // 秘密の質問のプレセットを呼び出してパラメータをセット
        $this->preset($smarty);
        $this->set_param($smarty, 0, $appInfo);
        
        /*
        echo $this->uid;
        echo "<br>";
        echo $this->secret_code;
        echo "<br>";
        */

        // ここでuidとシークレットコードがあってるかどうか確認する

        $inputFacade = $this->di->get('facade', array("InputFacade"));
        $checkAppData = $inputFacade->checkAppData($appInfo, 0, $appInfo);
        
        $is_exist_user = true;

        if( $this->is_environment()) {
            $is_exist_user = true;
        }

        $this->is_error = $this->check_uid_format($this->uid,$this->secret_code);

        if( $this->is_error == true ){
            $is_exist_user = false;
        }
        
        // uidもしくは秘密のコードがゲームに存在しない
        /*if($checkAppData !== true){
            $this->error_list['uid_secret_code'] = "ユーザーIDもしくは秘密のコードが正しくありません。";
            header('location: /mypage/input/registUid');
            exit();
        }*/

        // 認証OK
        if( $is_exist_user && $checkAppData === true){
            // 直接入力の時に対応
            if(empty($_SESSION['uid'])) $_SESSION['uid'] = isset($_POST["uid"]) ? $_POST["uid"] : null;
            if(empty($_SESSION['secret_code'])) $_SESSION['secret_code'] = isset($_POST["secret_code"]) ? $_POST["secret_code"] : null;
            header('location: /mypage/input/info');
            exit;
        }
        else {
            if($checkAppData !== true) {
                $this->error_list['uid_secret_code'] = "ユーザーIDもしくは秘密のコードが正しくありません。";
                $this->is_error = true;
            }

            $smarty->assign( 'is_error' , 1 );
            $this->registUid();
            exit;
        }
    }



}





