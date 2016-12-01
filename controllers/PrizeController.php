<?php

//namespace Controllers;

require_once __DIR__.'/Base.php';
/**
 * ポイント
 */
class PrizeController extends Controllers\Base
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
        
        $link['detail']     = "/mypage/prize/historyDetail";
        $link['mypage']     = "/mypage";
        $link['submit']     = "/mypage/prize/history";
        $link['reload']     = "/mypage/prize/history";

        // 実施している懸賞の内容一覧を取得。専用csvからとってくるよろし
        $dao_lot_info = $this->di->get('csv' , array('LotteryInfo'));
        $lotteryInfoList = $dao_lot_info->getLotteryInfoList();

        $time_facade = $this->di->get('facade', array("TimeFacade"));
        $lotteryInfoActive = array();
        $lotteryInfoFinished= array();
        foreach( $lotteryInfoList as $info ){
            $str_now = $time_facade->getNow();
            if( $time_facade->isPeriod($str_now,$info['start'],$info['end']) ){
                $lotteryInfoActive[] = $info;
            }
            else if( 0 < $time_facade->diffCheck($str_now,$info['end'])){
                $lotteryInfoFinished[] = $info;
            }
            else {

            }

        }

        // echo "<br />";
        // echo "lotteryInfoActive<br />";
        // var_dump( $lotteryInfoActive );
        // echo "<br />";
        // echo "<br />";

        $input_facade = $this->di->get('facade', array("InputFacade"));
        $personalInfo = $input_facade->read_user_info( $_SESSION['ID']);

        $lot_facade = $this->di->get('facade', array("LotFacade"));
        $lotResultList = $lot_facade->getApplyData($personalInfo["uid"]);

        // プライズの基本データ
        $dao_prize = $this->di->get('csv', array('PrizeData'));

        foreach ($lotResultList as &$data) {
            $lot_id     = $data['lot_id'];
            $prize_id   = $data['prize_id'];

            $lotteryInfo = $dao_lot_info->getLotteryInfo( $lot_id );
            $data['pointid'] = $lotteryInfo['pointid'];
            $data['lot_name']= $lotteryInfo['name'];

            if( 0 < $prize_id ){
                $prizeData = $dao_prize->getPrizeData($lot_id , $prize_id );
                $data['data'] = $prizeData;
                //var_dump($prizeData);
            }
        }

        // var_dump($data);

        //var_dump($lotResultList);

        $smarty->assign( 'info_active_num' , count($lotteryInfoActive) );
        $smarty->assign( 'info_active_list' , $lotteryInfoActive );

        $smarty->assign( 'info_finished_num' , count($lotteryInfoFinished) );
        $smarty->assign( 'info_finished_list' , $lotteryInfoFinished );

        $smarty->assign( 'prize_num' , count($lotResultList));
        $smarty->assign( 'prize_list' , $lotResultList );
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
        
        $link['back']   = "/mypage/prize/history";
        $link['mypage'] = "/mypage";

        $smarty->assign('link' , $link);

        // クラス名からテンプレートディレクトリ名取得
        $dir = strtolower(str_replace("Controller", "", get_class($this)));
        // メソッド名がファイル名
        $smarty->display($dir."/".__FUNCTION__.".html");
    }
}





