<?php


namespace Settings;

/**
 * デバッグクラス
 */
class Debug 
{

    public function log($value)
    {
        $date = date("Y/m/d H:i:s");
        $mes = '['.$date.']'.$value."\n";
        $file = '/var/log/debug/'.date("Ymd").'.log';
        
        // ファイルの存在確認
        if( !file_exists($file) ){
          // ファイル作成
          touch( $file );
        }
        error_log($mes, 3, $file);
        return true;
    }

}
