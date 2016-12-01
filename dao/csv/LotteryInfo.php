<?php

require_once __DIR__.'/DaoCsvBase.php';

use Dao\Csv;

/* 
 * @package csv
 * @auther mukaiyama
 * @ver 1.00
 */

class LotteryInfo extends Csv\DaoCsvBase
{
    protected $targetFile = 'apply/lot/';
    
    public function __construct($di)
    {
        // 基底クラスの初期設定。
        $this->initialize($di);
    }
    
    /**
     * 報酬データのcsvを読み込み返却する。
     * @param string $lot_id csvデータの名前を取得
     * @return array 報酬データを返却
     */
    public function getLotteryInfoList()
    {
        //取得するcsvデータの名前を設定
        $this->targetFile = 'apply/lotteryInfo';
        //対象のcsvファイルからデータに起こす。
        $csv_cache = $this->getData();
        $time_facade = $this->di->get('facade', array("TimeFacade"));

        foreach( $csv_cache as &$data ){
            $data['str_start'] = $time_facade->getFormat($data['start'] , 'Y年m月d日' );
            $data['str_end'] = $time_facade->getFormat($data['end'] , 'Y年m月d日' );
            $data['str_result'] = $time_facade->getFormat($data['result'] , 'Y年m月d日' );
        }
        return $csv_cache;
    }

    public function getLotteryInfo( $lot_id ){

        $data_list = $this->getLotteryInfoList();

        foreach( $data_list as $data ){
            if( $data['lot_id'] == $lot_id ){
                return $data;
            }
        }
        return array();
    }
}


