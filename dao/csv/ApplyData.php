<?php

require_once __DIR__.'/DaoCsvBase.php';

use Dao\Csv;

/* 
 * @package csv
 * @auther mukaiyama
 * @ver 1.00
 */

class ApplyData extends Csv\DaoCsvBase
{
    protected $targetFile = '';
    
    public function __construct($di)
    {
        // 基底クラスの初期設定。
        $this->initialize($di);
    }
    
    /**
     * 抽選データのcsvを読み込み返却する。
     * @param string $csv_name csvデータの名前を取得
     * @return array 抽選データを返却
     */
    public function getlotdata($csv_name = '')
    {
        //取得するcsvデータの名前を設定
        $this->targetFile = 'apply/'.$csv_name;
        
        //対象のcsvファイルからデータに起こす。
        $csv_cache = $this->getData();

        return $csv_cache;
    }
}
