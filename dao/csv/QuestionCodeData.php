<?php

require_once __DIR__.'/DaoCsvBase.php';

use Dao\Csv;

class QuestionCodeData extends Csv\DaoCsvBase
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
    public function getquestioncode($csv_name = '')
    {
        //取得するcsvデータの名前を設定
        $this->targetFile = 'questionCode/'.$csv_name;
        
        //対象のcsvファイルからデータに起こす。
        $csv = $this->getData();

        return $csv;
    }
}
