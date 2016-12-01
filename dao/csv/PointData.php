<?php

require_once __DIR__.'/DaoCsvBase.php';

use Dao\Csv;

/* 
 * @package csv
 * @auther mukaiyama
 * @ver 1.00
 */

class PointData extends Csv\DaoCsvBase
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
    public function getPointDataList()
    {
        //取得するcsvデータの名前を設定
        $this->targetFile = 'apply/pointData';
        echo $this->targetFile;
        //対象のcsvファイルからデータに起こす。
        $csv_cache = $this->getData();

        return $csv_cache;
    }

    public function getPointData( $pointid ){

        $data_list = $this->getPointDataList();

        foreach( $data_list as $data ){
            if( $data['pointid'] == $pointid ){
                return $data;
            }
        }
        return array();
    }
}


