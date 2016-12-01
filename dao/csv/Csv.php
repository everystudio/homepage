<?php

require_once __DIR__.'/DaoCsvBase.php';

use Dao\Csv;

/* 
 * @package csv
 * @auther mukaiyama
 * @ver 1.00
 */

class Csv extends Csv\DaoCsvBase
{
    public function __construct($di)
    {
        // 基底クラスの初期設定。
        $this->initialize($di);
    }

    public function getData

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


