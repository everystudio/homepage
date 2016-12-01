<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * ポイント
 */
class InputBaseController extends Controllers\Base
{
    public $password_length;

    // エラー検出用
    public $error_list;
    public $is_error;

    public $family_name;
    public $name;
    public $family_name_kana;
    public $kana;

    public $uid;
    public $secret_code;

    public $sex;
    public $birth_year;
    public $birth_month;
    public $birth_day;

    public $password;
    public $password_confirm;

    public $mail_address;
    public $mail_address_confirm;

    public $postalnumber;
    public $postalnumber_head;
    public $postalnumber_tail;
    public $prefecture;
    public $municipality;

    public $address01;
    public $address02;
    public $address03;

    public $driver_license;

    public $secret_question;
    public $secret_answer;

    public function __construct()
    {
        // 基底クラスの初期設定。controller配下では必ず呼び出す
        $this->initialize();

        $this->password_length = 8;
    }
    

    public function preset($_smarty){

        if( isset($is_loaded_preset) ){
            return;
        }
        $is_loaded_preset = true;

        $prefecture_list[] = "北海道"; // ここが0,1両方兼任になるらしい。迷惑
        $prefecture_list[] = "青森県";
        $prefecture_list[] = "岩手県";
        $prefecture_list[] = "宮城県";
        $prefecture_list[] = "秋田県";
        $prefecture_list[] = "山形県";
        $prefecture_list[] = "福島県";
        $prefecture_list[] = "茨城県";
        $prefecture_list[] = "栃木県";
        $prefecture_list[] = "群馬県";
        $prefecture_list[] = "埼玉県";
        $prefecture_list[] = "千葉県";
        $prefecture_list[] = "東京都";
        $prefecture_list[] = "神奈川県";
        $prefecture_list[] = "新潟県";
        $prefecture_list[] = "富山県";
        $prefecture_list[] = "石川県";
        $prefecture_list[] = "福井県";
        $prefecture_list[] = "山梨県";
        $prefecture_list[] = "長野県";
        $prefecture_list[] = "岐阜県";
        $prefecture_list[] = "静岡県";
        $prefecture_list[] = "愛知県";
        $prefecture_list[] = "三重県";
        $prefecture_list[] = "滋賀県";
        $prefecture_list[] = "京都府";
        $prefecture_list[] = "大阪府";
        $prefecture_list[] = "兵庫県";
        $prefecture_list[] = "奈良県";
        $prefecture_list[] = "和歌山県";
        $prefecture_list[] = "鳥取県";
        $prefecture_list[] = "島根県";
        $prefecture_list[] = "岡山県";
        $prefecture_list[] = "広島県";
        $prefecture_list[] = "山口県";
        $prefecture_list[] = "徳島県";
        $prefecture_list[] = "香川県";
        $prefecture_list[] = "愛媛県";
        $prefecture_list[] = "高知県";
        $prefecture_list[] = "福岡県";
        $prefecture_list[] = "佐賀県";
        $prefecture_list[] = "長崎県";
        $prefecture_list[] = "熊本県";
        $prefecture_list[] = "大分県";
        $prefecture_list[] = "宮崎県";
        $prefecture_list[] = "鹿児島県";
        $prefecture_list[] = "沖縄県";

        for( $i = 2014 ; 1900 < $i ; $i-- ){
            $birth_year_list[] = $i;
        }

        for( $i = 1 ; $i <= 12 ; $i++ ){
            $birth_month_list[] = $i;
        }

        for( $i = 1 ; $i <= 31 ; $i++ ){
            $birth_day_list[] = $i;
        }

        $secret_question_list[] = "お父さんの出身地は？";
        $secret_question_list[] = "ペットの名前は？";
        $secret_question_list[] = "母親の旧姓は？";
        $secret_question_list[] = "最初に乗った車の車種は？";
        $secret_question_list[] = "初恋の人のファーストネームは？";
        $secret_question_list[] = "初めて買った曲のタイトルは？";
        $secret_question_list[] = "座右の銘は？";
        $secret_question_list[] = "祖父の下の名前は？";
        $secret_question_list[] = "生まれた病院は？";
        $secret_question_list[] = "リタイア後に住みたい場所は？";
        $secret_question_list[] = "初めて買った車は？";
        $secret_question_list[] = "一番好きなスポットは？";
        $secret_question_list[] = "一番好きな演劇・劇団は？";
        $secret_question_list[] = "応援しているチームは？";
        $secret_question_list[] = "嫌いな食べ物は？";

        $_smarty->assign('prefecture_list' , $prefecture_list);
        $_smarty->assign('birth_year_list' , $birth_year_list);
        $_smarty->assign('birth_month_list' , $birth_month_list);
        $_smarty->assign('birth_day_list' , $birth_day_list);
        $_smarty->assign('secret_question_list' , $secret_question_list);

        return;
    }

    public function set_param($_smarty , $mode = 0, $appInfo){

        if( isset($is_loaded_set_param) ){
            return;
        }
        $is_loaded_set_param = true;
        $this->name           = (isset($_POST['form_2'])) ? $_POST['form_2'] : '';
        $this->kana           = (isset($_POST['form_3'])) ? $_POST['form_3'] : '';
        $this->family_name    = (isset($_POST['family_name'])) ? $_POST['family_name'] : '';
        $this->family_name_kana = (isset($_POST['family_name_kana'])) ? $_POST['family_name_kana'] : '';

        $this->uid          = isset($appInfo["uid"]) ? $appInfo["uid"] : '';
        $this->secret_code  = isset($appInfo["secret_code"]) ? $appInfo["secret_code"] : '';

        $this->sex            = (isset($_POST['sex'])) ? $_POST['sex'] : 1;
        $this->birth_year     = (isset($_POST['birth_year'])) ? $_POST['birth_year'] : 1;
        $this->birth_month    = (isset($_POST['birth_month'])) ? $_POST['birth_month'] : 1;
        $this->birth_day      = (isset($_POST['birth_day'])) ? $_POST['birth_day'] : 1;

        $this->password         = (isset($_POST['form_password'])) ? $_POST['form_password'] : '';
        $this->password_confirm = (isset($_POST['form_password_confirm'])) ? $_POST['form_password_confirm'] : '';

        if( $mode == 1 ){
            $this->mail_address         = (isset($_POST['form_mail_address'])) ? $_POST['form_mail_address'] : '';
            $this->mail_address_confirm = (isset($_POST['form_mail_address_confirm'])) ? $_POST['form_mail_address_confirm'] : '';
        }
        else {
            // メールアドレスはセッションから取得する
            $this->mail_address          = $_SESSION['mail_address'];
            $this->mail_address_confirm  = $_SESSION['mail_address'];
        }

        $this->postalnumber   = (isset($_POST['form_4'])) ? $_POST['form_4'] : '';
        $this->postalnumber_head = substr($this->postalnumber,0,3);
        $this->postalnumber_tail = substr($this->postalnumber,3,4);
        $this->prefecture     = (isset($_POST['prefecture'])) ? $_POST['prefecture'] : 1;
        $this->municipality   = (isset($_POST['form_5'])) ? $_POST['form_5'] : '';

        $this->address01      = (isset($_POST['form_6'])) ? $_POST['form_6'] : '';
        $this->address02      = (isset($_POST['form_7'])) ? $_POST['form_7'] : '';
        $this->address03      = (isset($_POST['form_8'])) ? $_POST['form_8'] : '';

        $this->driver_license = (isset($_POST['licence_01'])) ? $_POST['licence_01'] : '';

        $this->secret_question= (isset($_POST['secret_question'])) ? $_POST['secret_question'] : 1;
        $this->secret_answer  = (isset($_POST['secret_answer'])) ? $_POST['secret_answer'] : '';

        /*
        $driver_license = 1;
        $secret_question = 3;
        $secret_answer = "テストに出ます";
        */

        $_smarty->assign('name' , $this->name);
        $_smarty->assign('kana' , $this->kana);
        $_smarty->assign('family_name' , $this->family_name);
        $_smarty->assign('family_name_kana' , $this->family_name_kana);

        $_smarty->assign('uid' , $this->uid);
        $_smarty->assign('secret_code' , $this->secret_code);

        $_smarty->assign('sex' , $this->sex);
        $_smarty->assign('birth_year' , $this->birth_year);
        $_smarty->assign('birth_month' , $this->birth_month);
        $_smarty->assign('birth_day' , $this->birth_day);
        $_smarty->assign('password' , $this->password);
        $_smarty->assign('password_confirm' , $this->password_confirm);
        $_smarty->assign('mail_address' , $this->mail_address);
        $_smarty->assign('mail_address_confirm' , $this->mail_address_confirm);
        $_smarty->assign('postalnumber' , $this->postalnumber);
        $_smarty->assign('postalnumber_head' , $this->postalnumber_head);
        $_smarty->assign('postalnumber_tail' , $this->postalnumber_tail);
        $_smarty->assign('prefecture' , $this->prefecture);
        $_smarty->assign('municipality' , $this->municipality);
        $_smarty->assign('address01' , $this->address01);
        $_smarty->assign('address02' , $this->address02);
        $_smarty->assign('address03' , $this->address03);
        $_smarty->assign('driver_license' , $this->driver_license);
        $_smarty->assign('secret_question' , $this->secret_question);
        $_smarty->assign('secret_answer' , $this->secret_answer);

        return;
    }

    /**
        入力データに不備がないかのチェックを行う

        return true;    特に問題無し
        return false;   何か問題がありますぜ。詳しくはerror_listに入れときました
    */
    public function check_input($form_type = "regist"){

        $this->error_list = array();
        $birthday = $this->birth_year . '-' . $this->birth_month .'-' . $this->birth_day;
        $createtime = date("Y-m-d H:i:s");

        // echo $password_salt;
        // echo "<br />";
        // echo $this->name;
        // echo "<br />";
        // echo $this->kana;
        // echo "<br />";
        // echo $this->sex;
        // echo "<br />";
        // echo $birthday;
        // echo "<br />";
        // echo $this->postalnumber;
        // echo "<br />";
        // echo $this->prefecture;
        // echo "<br />";
        // echo $this->municipality;
        // echo "<br />";
        // echo $this->address01;
        // echo "<br />";
        // echo $this->address02;
        // echo "<br />";
        // echo $this->address03;
        // echo "<br />";
        // echo $this->driver_license;
        // echo "<br />";
        // echo $createtime;
        // echo "<br />";

        // 入力が不十分な時のエラー処理 -----------------------
        $is_error = false;

        if( empty($this->name)){
            $this->error_list['name'] = "名前が入力されていません";
            $is_error = true;
        }
        if( empty($this->kana)){
            $this->error_list['kana'] = "ふりがなが入力されていません";
            $is_error = true;
        }
        if( empty($this->family_name)){
            $this->error_list['family_name'] = "名前が入力されていません";
            $is_error = true;
        }
        if( empty($this->family_name_kana)){
            $this->error_list['family_name_kana'] = "ふりがなが入力されていません";
            $is_error = true;
        }

        if( $this->sex == 0 ){
            $this->error_list['sex'] = "性別が入力されていません";
            $is_error = true;
        }
        if( empty($this->birth_year)){
            $is_error = true;
            $this->error_list['birthdaty'] = "誕生日が入力されていません(年)";
        }
        if( empty($this->birth_month)){
            $is_error = true;
            $this->error_list['birthdaty'] = "誕生日が入力されていません(月)";
        }
        if( empty($this->birth_day)){
            $is_error = true;
            $this->error_list['birthdaty'] = "誕生日が入力されていません(日)";
        }
        if( $form_type == "regist" && empty($this->password)){
            $is_error = true;
            $this->error_list['password'] = "パスワードが入力されていません";
        }
        if( $form_type == "regist" && empty($this->password_confirm)){
            $is_error = true;
            $this->error_list['password_confirm'] = "確認用のパスワードが入力されていません";
        }
        if( empty($this->mail_address)){
            $is_error = true;
            $this->error_list['mail_address'] = "メールアドレスが入力されていません";
        }
        if( empty($this->mail_address_confirm)){
            $is_error = true;
            $this->error_list['mail_address_confirm'] = "確認用メールアドレスが入力されていません";
        }

        if( isset($this->birth_year) ){
            if($this->birth_year < 1900){
                $is_error = true;
                $this->error_list['birth_year'] = "生まれ年の入力に不備がございます";
            }
        }
        if( isset($this->birth_month) ){
            if($this->birth_month < 0 || 12<$this->birth_month){
                $is_error = true;
                $this->error_list['birth_month'] = "生まれ月の入力に不備がございます";
            }
        }
        if( isset( $this->birth_day )){
            if( $this->birth_day < 0 || 31<$this->birth_day ){
                $is_error = true;
                $this->error_list['birth_day'] = "生まれた日にちの入力に不備がございます";
            }
        }

        $input_facade = $this->di->get('facade', array("InputFacade"));

        $temp_error_msg = "";
        if( $form_type == "regist" && !$input_facade->checkPasswordFormat($this->password , $this->password_length , $temp_error_msg )){
            $is_error = true;
            $this->error_list['password'] = $temp_error_msg;
            $temp_error_msg = "";
        }
        //$is_error = empty($this->password_confirm);

        if( $form_type == "regist" && $this->password != $this->password_confirm){
            $is_error = true;
            $error_msg = "パスワードと確認用のパスワードが一致しません！";
            $this->error_list['password_mismatch'] = "パスワードと確認用のパスワードが一致しません！";
        }

        if(!empty($this->postalnumber)){

            if(preg_match('/^([0-9]{3})(-[0-9]{4})?$/i', $this->postalnumber )){
                // 一応いらんもの抜き出す
                $this->postalnumber = preg_replace("/[^0-9]+/", "", $this->postalnumber);

                $this->postalnumber   = (isset($_POST['form_4'])) ? $_POST['form_4'] : '';
                $this->postalnumber_head = substr($this->postalnumber,0,3);
                $this->postalnumber_tail = substr($this->postalnumber,3,4);

                // postもするのでここで吸収
                $smarty->assign('postalnumber' , $this->postalnumber);
                $smarty->assign('postalnumber_head' , $this->postalnumber_head);
                $smarty->assign('postalnumber_tail' , $this->postalnumber_tail);
            }

            if(preg_match('/^[0-9]+$/i', $this->postalnumber)){
                if( strlen($this->postalnumber)==7){
                    ;// OK!
                }
                else {
                    $is_error = true;
                    $error_msg = "郵便番号は7桁の数字でお願いいたします";
                    $this->error_list['postalnumber'] = "郵便番号は7桁の数字でお願いいたします";
                }
            }
            else {
                $is_error = true;
                $error_msg = "郵便番号は数字以外の文字が含まれます";
                $this->error_list['postalnumber'] = "郵便番号に数字以外の文字が含まれます";
            }
        }
        else {
            $is_error = true;
            $this->error_list['postalnumber'] = "郵便番号が入力されていません";
        }
        if( empty($this->prefecture)){
            $is_error = true;
            $this->error_list['prefecture'] = "都道府県が選択されていません";
        }
        if( empty($this->municipality)){
            $is_error = true;
            $this->error_list['municipality'] = "市区町村が入力されていません";
        }
        if( empty($this->address01)){
            $is_error = true;
            $this->error_list['address01'] = "町域が入力されていません";
        }
        if( empty($this->address02)){
            $is_error = true;
            $this->error_list['address02'] = "番地が入力されていません";
        }
        if( empty($this->driver_license)){
            $is_error = true;
            $this->error_list['driver_license'] = "選択してください";
        }
        if( $form_type == "regist" && empty($this->secret_question)){
            $is_error = true;
            $this->error_list['secret_question'] = "選択してください";
        }
        if( $form_type == "regist" && empty($this->secret_answer)){
            $is_error = true;
            $this->error_list['secret_answer'] = "秘密の質問が入力されていません";
        }

        return $is_error;
    }

    /**
        uidとシークレットコードのフォーマットをチェックする関数
        ページ的に別になっちゃったのもあったのでついでの分けました
        なお、フォーマットの確認をするだけなので、実際に存在するデータかどうかまでは
        みてません
    */
    public function check_uid_format($uid , $secret_code){

        $is_error = false;

        if(!empty($uid)){
            if(preg_match('/^[0-9]+$/i', $uid)){
                if( strlen($uid)==9){
                    ; // OK!
                }
                else {
                    $is_error = true;
                    $this->error_list['uid'] = "パズキンのユーザーIDは9桁の数字です";
                }
            }
            else {
                $is_error = true;
                $this->error_list['uid'] = "パズキンのユーザーIDは数字のみです";
            }
        }
        else {
            $is_error = true;
            $this->error_list['uid'] = "パズキンのユーザーIDが入っていません";
        }

        $is_secret_code_ok = false;
        if(!empty($secret_code)){
            if(preg_match('/^[a-zA-Z0-9_]+$/i', $secret_code)){
                if( strlen($secret_code)==11){
                    $is_secret_code_ok = true;
                }
            }
        }
        if( $is_secret_code_ok == false ) {
            $is_error = true;
            $this->error_list['secret_code'] = "シークレットコードはパズキンアプリ内で確認を行ってください";
        }
        //$this->is_error = $is_error;
        return $is_error;

    }



}





