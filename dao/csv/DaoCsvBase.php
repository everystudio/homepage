<?php

/*
 * @package csv
 * @auther mukaiyama
 */

namespace Dao\Csv;

class DaoCsvBase
{

    /**
     * DIコンテナ
     */
    protected $di = null;
    
    protected $targetFile = '';


    /**
     * 初期化処理
     */
    public function initialize($di)
    {
        $this->di = $di;

    }

    /**
     * CSVファイルの内容を取得する
     *
     * @return array CSV情報
     */
    public function getData()
    {

        //キャッシュに値がない場合
        $config = $this->di->get('config');
        $file = $config['csvDir'].$this->targetFile.'.csv';
    
        //ファイルが存在しない場合、warningを出すが、後で、アプリエラーとして処理しているので、ここではPHPエラーを抑制する
        $fp   = @fopen($file, "r");

        if (!$fp) {
            throw new error\CacheError($file.' is not found!!');
        }

        //keyを取り出し
        $csv_key = fgetcsv($fp, 0, ",");

        while (($data = fgetcsv($fp, 0, ",")) !== false) {
            $csv[] = $data;
        }

        fclose($fp);

        //CSVデータからキャッシュに保存
        $result = $this->setCache($csv, $csv_key);

        return $result;
    }

    /**
     * キャッシュに格納する共通メソッド
     * 必要に応じてオーバーライドする
     *
     * @param array $csv   データ配列
     * @param array $keys  キーの配列
     * @param array $cache キャッシュ処理用オブジェクト
     */
    protected function setCache($csv, $keys)
    {
//        インデックスをid番号にして配列に格納
        $temp = array();
        $n = 1;
        foreach ($csv as $records) {
            foreach ($records as $key => $record) {
                $temp[$n][$keys[$key]] = $record;
            }
            $n++;
        }

        return $temp;
    }
}
