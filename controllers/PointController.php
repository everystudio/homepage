<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * ポイント
 */
class PointController extends Controllers\Base
{
    public function __construct()
    {
        // 基底クラスの初期設定。controller配下では必ず呼び出す
        $this->initialize();
    }
    
    public function history() {

        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $dbh = $this->di->get('dbh');
        $smarty = $this->di->get('smarty');
        
        $use_dbh = $dbh['user_official'];
        $user = $this->di->get('facade', array("UserFacade"));
        $lot = $this->di->get('facade', array("LotFacade"));
        $input_facade = $this->di->get('facade', array("InputFacade"));
        
        // uid的な誰かを調べる
        $personalInfo = $input_facade->read_user_info( $_SESSION['ID']);

        // 上のほうに表示する所持ポイント関連の処理 --------------------------
        $spdungeonPoint = $user->getSpdungeonPoint($personalInfo["uid"]);
        foreach( $spdungeonPoint as &$point_data){
            $dao_point_data = $this->di->get('csv', array('PointData'));
            $temp_data = $dao_point_data->getPointData($point_data['pointid']);

            $point_data['point_name'] = $temp_data['name'];
        }

        // ------------------------------------------------------------


        // 利用履歴 ====================================================
        $lot_facade = $this->di->get('facade', array("LotFacade"));

        // 応募データ（履歴とは違う）
        $applyDataList = $lot_facade->getApplyData($personalInfo["uid"]);

        $csv_name = "lotteryData";
        $dao = $this->di->get('csv', array('ApplyData'));
        $lotteryData = $dao->getlotdata($csv_name);
        
        // 応募履歴に利用ポイントを加える
        $needBox = array();
        $logUserApply = $lot->getLogUserApply($personalInfo["uid"]);
        // ------------------------------------------------------------

        // ログから利用ポイント取るようになったら処理変わるかも
        /*foreach ($logUserApply as &$val) {
            if(!isset($needBox[$val["lot_id"]])){
                foreach ($lotteryData as $v) {
                    if($val["lot_id"] == $v["lot_id"]){
                        $needBox[$val["lot_id"]] = $v["need"];
                    }
                }
            }
            $updatetime = strtotime($val["updatetime"]);
            $val["updatetime"] = date( 'Y年m月d日', $updatetime );
            $val["use_point"] = $needBox[$val["lot_id"]] * $val["count"];
            
        }*/

        $link['detail']   = "/mypage/point/historyDetail";
        $link['mypage'] = "/mypage";
        $link['submit'] = "/mypage/point/history";
        $link['logout'] = "/mypage/logout/exec";
        $link['reload'] = "/mypage/point/history";

        // var_dump($spdungeonPoint);

        $smarty->assign('point_count' , count($spdungeonPoint));
        $smarty->assign('spdungeonPoint' , $spdungeonPoint);

        // 応募関連のデータ(使わない？)
        $smarty->assign('apply_num' , count($applyDataList));
        $smarty->assign('applyDataList' , $applyDataList);

        // 応募のログデータ
        //var_dump($logUserApply);
        //var_dump($lotteryData);
        $smarty->assign('log_count' , count($logUserApply));

        $dao_lot_info = $this->di->get('csv' , array('LotteryInfo'));
        $dao_point_data = $this->di->get('csv' , array('PointData'));
        if (is_array($logUserApply)) {
            foreach( $logUserApply as &$log_data ){

                $info_data = $dao_lot_info->getLotteryInfo( $log_data['lot_id'] );
                var_dump($info_data);
                $log_data['name'] = $info_data['name'];

                $temp_data = $dao_point_data->getPointData($log_data['pointid']);
                $log_data['point_name'] = $temp_data['name'];

    //            $log_data['title'] = 

            }
        }
        $smarty->assign('logUserApply' , $logUserApply);
        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function historyDetail() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        
        $link['back']   = "/mypage/point/history";
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
    
    public function limit() {
        // 設定ファイル読み込み
        $config = $this->di->get('config');
        $smarty = $this->di->get('smarty');
        
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
}





