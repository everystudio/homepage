<?php

require_once __DIR__.'/DaoCsvBase.php';

use Dao\Csv;

/* 
 * @package csv
 * @auther mukaiyama
 * @ver 1.00
 */

class LotteryData extends Csv\DaoCsvBase
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
    public function getLotteryDataList()
    {
        //取得するcsvデータの名前を設定
        $this->targetFile = 'apply/lotteryData';
        //対象のcsvファイルからデータに起こす。
        $csv_cache = $this->getData();

        return $csv_cache;
    }

    public function getLotteryData( $lot_id ){

        $data_list = $this->getLotteryDataList();

        foreach( $data_list as $data ){
            if( $data['lot_id'] == $lot_id ){
                return $data;
            }
        }
        return array();
    }
}


