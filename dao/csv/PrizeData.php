<?php

require_once __DIR__.'/DaoCsvBase.php';

use Dao\Csv;

/* 
 * @package csv
 * @auther mukaiyama
 * @ver 1.00
 */

class PrizeData extends Csv\DaoCsvBase
{
    protected $targetFile = '';
    
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
    public function getPrizeDataList($lot_id )
    {
        //取得するcsvデータの名前を設定
        $this->targetFile = 'apply/lot/prize'. sprintf("%04d",$lot_id) .'Data';
        echo $this->targetFile;
        //対象のcsvファイルからデータに起こす。
        $csv_cache = $this->getData();

        return $csv_cache;
    }

    public function getPrizeData( $lot_id , $prize_id){

        $data_list = $this->getPrizeDataList($lot_id);

        foreach( $data_list as $data ){
            if( $data['prize_id'] == $prize_id ){
                return $data;
            }
        }
        return array();
    }
}


