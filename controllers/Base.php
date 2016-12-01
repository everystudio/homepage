<?php

/*
 * 基底クラス
 *
 * @package user
 * @author Mukaiyama
 * @created 2014-02-24
 * @updated 2014-02-24
 *
 */

namespace Controllers;

use Settings\Di;
//require_once __DIR__.'/../settings/Di.php';

/**
 * 本アプリケーションで、コントローラーが継承するクラス
 */
class Base 
{
    public $smarty;
    public $config;

    public $link;
    /**
     * DIコンテナ
     * 
     */
    protected $di = null;
    
    /**
     * デバッグログ
     * 
     * @var \App\Libs\MyLog 
     */
    protected $dlog = null; //ロガー

    /**
     * リクエストデータを格納するPOST変数のフィールド名
     */
    const REQ_DATA = 'req_data';
    
    /**
     * ユーザーIDを表すフィールド名
     */
    const UID      = 'uid';
    
    /**
     * 設定ファイル
     */
    private $setting_list = array(
        'config',
        'database',
        'smarty',
        'Di'
    );


    /**
     * 初期化処理
     * 一度しか通らないため、継承先クラスで、複数インスタンスを作成する場合は
     * cloneしなければならない
     */
    public function initialize()
    {
        $this->setting();
        /*
        if( $this->is_environment() ){
            echo "ローカル環境のみ<br />";
            echo "_POSTデータ<br />";
            var_dump($_POST);
            echo "<br />_SESSIONデータ<br />";
            var_dump($_SESSION);
            echo "<br />_COOKIEデータ<br />";
            var_dump($_COOKIE);
        }
        */

        $this->link['top']                = "/top";
        $this->link['develop']            = "/develop";
        $this->link['product']            = "/product";
        $this->link['activity']           = "http://every-studio.com/wordpress";
        $this->link['capture']            = "/captureTop";
        $this->link['question']           = "/question";

        $this->link['twitter']            = "https://twitter.com/everystudio";

        $this->smarty->assign("title" , "毎日工房　公式サイト");


    }
    
    /**
     * 設定ファイル読み込み
     */
    private function setting()
    {
        $config = null;
        $dbh = null;
        $smarty = null;
        
        $setting_list = $this->setting_list;
        foreach ($setting_list as $val) {
            require_once __DIR__.'/../settings/'.$val.'.php';
        }

        // 環境設定ごとの固有設定
        $enviroment_setting = "enviroment.php";
        if(file_exists(__DIR__.'/../settings/'.$enviroment_setting)) {
            require_once __DIR__.'/../settings/'.$enviroment_setting;
        }
        
        $this->di = new Di();

        $this->di->set('dbh', $dbh);
        $this->di->set('config', $config);
        $this->di->set('smarty', $smarty);

        $this->config = $config;
        $this->smarty = $smarty;
        
        $this->dlog = $this->di->get('debug', array());
                
        //認証時に処理したリクエストを受け取る
        //$auth = $this->di->get('auth');
    }

    /*public function read_user_info($user_dbh , $id ){

        $sql = "select * from personalInfo where id = :id";
        $stmt = $user_dbh->prepare($sql);
        $stmt->bindParam(':id',$id,1);//PDO::PARAM_INT=1

        $ret = $stmt->execute();
        if( !$ret ){
            throw new PDOException('select 失敗！');
        }
        $result = $stmt->fetch(2);// PDO::FETCH_ASSOC=2

        return $result;
    }*/

    public function is_environment(){
        if( $_SERVER['ENVIRONMENT'] == 'development'  ){
            return true;
        }
        else {
            return false;
        }
    }

    public function setMethodName( $methodName ){
        $this->methodName = $methodName;
        return;
    }

    public function assign_link(){        
        $this->smarty->assign('link' , $this->link );
    }

    public function display( $className , $methdoName ){

        $this->assign_link();

        // クラス名からテンプレートディレクトリ名取得
        $dir = lcfirst(str_replace("Controller", "", $className ));

        // メソッド名がファイル名
        $this->smarty->display($dir."/".$methdoName.".html");

    }



}






