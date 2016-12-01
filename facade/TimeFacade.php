<?php


require_once __DIR__.'/Base.php';
/**
 * ユーザー情報に関する処理
 */
class TimeFacade extends Facade\Base
{
    // タイムゾーン
    public $timezone = 'Asia/Tokyo';

    public function __construct($di)
    {
        // 基底クラスの初期設定。
        $this->initialize($di);
    }
    /**
     現在の日時を取得する
     オフセット処理とかを入れる予定なので別関数として利用
    */
    public function getNow($format = 'Y-m-d H:i:s'){
        $dt = new DateTime();
        return $dt->format($format);
    }

    /**
        受け取った時間を指定のフォーマットで返す
    */
    public function getFormat( $datetime , $format = 'Y-m-d H:i:s'){
        $time = strtotime($datetime);
        return date( $format , $time );
    }

    /**
        ベースの日付からのズレをチェック
        < 0 : 未来
        0 < : 過去
        ==0 : 現在
    */
    public function diffCheck( $time_base , $time_check ){
        $ret = 0;
        if(strtotime($time_base) < strtotime($time_check)){
            $ret = 1;
        }
        else if( strtotime($time_check) < strtotime($time_base) ){
            $ret =-1;
        }
        else {
            $ret = 0;
        }

        // なんか引き算しても出てきたような気がするけどとりあえずこれで
        return $ret;
    }

    /**
        指定された期間内かどうか
        真偽判定ではないのでご注意
        < 0 : $end以降
        0 < : $start以前
        ==0 : 期間内
    */
    public function checkPeriod( $target , $start , $end ){
        if( $this->diffCheck($target,$end) < 0 ){
            //$ret = 1;
            $ret = false;
        }
        else if( 0 < $this->diffCheck($target,$start) ){
            //$ret =-1;
            $ret = false;
        }
        else {
            //$ret = 0;
            $ret = true;
        }
        return $ret;
    }

    /**
        やはり真偽判定がないと使いにくいので準備
    */
    public function isPeriod( $target , $start , $end ){
        if( $this->checkPeriod($target , $start , $end)){
            return true;
        }
        else {
            return false;
        }
    }


}























