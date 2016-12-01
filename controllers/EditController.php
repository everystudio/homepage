<?php

//namespace Controllers;

require_once __DIR__.'/InputBaseController.php';
/**
 * ポイント
 */
class EditController extends InputBaseController
{
    public function __construct()
    {
        // 基底クラスの初期設定。controller配下では必ず呼び出す
        $this->initialize();
    }

    public function index(){

        $id = $_SESSION["ID"];
        $dbh = $this->di->get('dbh');
        $use_dbh = $dbh['user_official'];
        $sql = "select * from personalInfo where id = :id";
        $stmt = $use_dbh->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);

        $ret = $stmt->execute();
        if( !$ret ){
            throw new PDOException('select 失敗！');
        }
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $_POST['family_name'] = $result['family_name'];
        $_POST['form_2'] = $result['first_name'];
        $_POST['family_name_kana'] = $result['family_name_furi'];
        $_POST['form_3'] = $result['first_name_furi'];
        $_POST['sex'] = $result['sex'];

        $birthday = $result['birthday'];

        $_POST['birth_year'] = substr( $birthday , 0 , 4 );
        $_POST['birth_month'] = substr( $birthday , 5 , 2 );
        $_POST['birth_day'] = substr( $birthday , 8 , 2 );
        $_POST['form_password'] = "";
        $_POST['form_password_confirm'] = "";

        $_POST['form_mail_address'] = $result['mail_address'];
        $_POST['form_mail_address_confirm'] = $result['mail_address'];
        $_POST['form_4'] = $result['postalnumber'];
        $_POST['prefecture'] = $result['prefecture'];
        $_POST['form_5'] = $result['municipality'];
        $_POST['form_6'] = $result['address01'];
        $_POST['form_7'] = $result['address02'];
        $_POST['form_8'] = $result['address03'];
        $_POST['licence_01'] = $result['driver_license'];
        $_POST['secret_question'] = $result['secret_question'];
        $_POST['secret_answer'] = $result['secret_answer'];

        // var_dump($_POST);

        $this->profile();

        return;

    }
    
    public function inputPassword() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $dbh = $this->di->get('dbh');
        $smarty = $this->di->get('smarty');
        
        $use_dbh = $dbh['user_official'];


        $input_facade = $this->di->get('facade', array("InputFacade"));
        $result = $input_facade->read_user_info( $_SESSION['ID'] );

        $link['check']   = "/mypage/edit/checkPassword";
        $link['remind']= "/mypage/login/remind";
        $link['mypage'] = "/mypage";

        if( isset($_SESSION['edit_pass_error']) && 0 < $_SESSION['edit_pass_error'] ){
            $smarty->assign('is_error' , 1 );
            $_SESSION['edit_pass_error'] = 0;
            $_SESSION['editing'] = 0;
        }

        $smarty->assign('link' , $link);
        $smarty->assign('user_data',$result);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }

    public function checkPassword(){

        $password = $_POST['form_1'];

        $dbh = $this->di->get('dbh');
        $use_dbh = $dbh['user_official'];

        $input_facade = $this->di->get('facade', array("InputFacade"));
        $result = $input_facade->read_user_info( $_SESSION['ID']);
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
            $_SESSION['editing'] = 1;
            header('Location: /mypage/edit'); 
        }
        else {
            $_SESSION['edit_pass_error'] = 1;
            header('Location: /mypage/edit/inputPassword'); 
        }
    }
    
    public function profile() {

        if( $_SESSION['editing'] != 1 ){
            header('Location: /mypage/edit/inputPassword'); 
        }
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');

        $this->preset($smarty);
        $appInfo = array();
        $this->set_param($smarty,1,$appInfo);

        $link['check']  = "/mypage/edit/check";
        $link['clear'] 	= "/mypage/edit";
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    /**
        パスワード入力後、あっているかどうか
    */
    public function check() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');

        $this->preset($smarty);
        $this->set_param($smarty,1);

        $this->is_error = $this->check_input("edit");

        $link['ok'] = "/mypage/edit/finished";
        $link['cancel'] = "/mypage/edit/profile";
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        if( $this->is_error ){
            $smarty->assign( "is_error" , 1 );
            $smarty->assign('error_list' , $this->error_list);
            $this->profile();
            exit;
        }

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }


    public function finished() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');

        $dbh = $this->di->get('dbh');
        $use_dbh = $dbh['user_official'];

        $this->preset($smarty);
        $this->set_param($smarty,1);

        $birthday = $this->birth_year . '-' . $this->birth_month .'-' . $this->birth_day;

        $sql = "update personalInfo set ";
        $sql.= "family_name = :family_name , ";
        $sql.= "first_name = :first_name , ";
        $sql.= "family_name_furi = :family_name_furi , ";
        $sql.= "first_name_furi = :first_name_furi , ";
        $sql.= "sex = :sex , ";
        $sql.= "birthday = :birthday , ";
        $sql.= "postalnumber = :postalnumber , ";
        $sql.= "prefecture = :prefecture , ";
        $sql.= "municipality = :municipality , ";
        $sql.= "address01 = :address01 , ";
        $sql.= "address02 = :address02 , ";
        $sql.= "address03 = :address03 , ";
        $sql.= "driver_license = :driver_license , ";
        $sql.= "mail_address = :mail_address ";
        $sql.= "where id = :id ";

        $use_dbh->beginTransaction();
        $stmt = $use_dbh->prepare($sql);

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
        $stmt->bindParam(':mail_address',$this->mail_address,PDO::PARAM_STR);
        $stmt->bindParam(':id',$_SESSION['ID'],PDO::PARAM_INT);

        try {
            $ret = $stmt->execute();
            if(!$ret){
                throw new PDOException('データの書き込みに失敗しました');
            }
            $use_dbh->commit();

        }
        catch (PDOException $e) {
            $use_dbh->rollBack();
            die(mb_convert_encoding($e->getMessage(), 'UTF-8','auto'));
            // 失敗用のページに飛ばなきゃですね
        }

        $link['mypage'] = "/mypage";

        $_SESSION['editing'] = 0;

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

        $this->preset($smarty);
        $this->set_param($smarty,1);

        $link['check']   = "/mypage/edit/passwordCheck";
        $link['clear']      = "/mypage/";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }

    public function passwordCheck() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');

        $this->preset($smarty);
        $this->set_param($smarty,1);

        $link['ok'] = "/mypage/edit/passwordFinished";
        $link['cancel'] = "/mypage/edit/password";
        $link['mypage'] = "/mypage";

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

        $dbh = $this->di->get('dbh');
        $use_dbh = $dbh['user_official'];

        $this->preset($smarty);
        $this->set_param($smarty,1);

        $use_dbh->beginTransaction();
        $stmt = $use_dbh->prepare($sql);

        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }

}





