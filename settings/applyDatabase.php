<?php
//==================================
// ゲーム側DB向き先設定
//==================================
$env = $_SERVER['ENVIRONMENT'];
/*
switch($env) {
    case 'development'://開発環境でのDB向き先設定
        $appDb = array(
            'user' => array('host' => 'localhost', 'username' => 'root', 'password' => 'poi123', 'dbname' => 'user'),
            'event'=> array('host' => 'localhost', 'username' => 'root', 'password' => 'poi123', 'dbname' => 'event'),
            'log'  => array('host' => 'localhost', 'username' => 'root', 'password' => 'poi123', 'dbname' => 'log')
        );
        break;
    case 'staging'://ステージングでのDB向き先設定
        $appDb = array(
            'user' => array('host' => 'staging-puzzle-db.cxmlqtgxkbsb.ap-northeast-1.rds.amazonaws.com', 'username' => 'taison_inc', 'password' => '43Q9q3gFhq', 'dbname' => 'user'),
            'event'=> array('host' => 'staging-puzzle-db.cxmlqtgxkbsb.ap-northeast-1.rds.amazonaws.com', 'username' => 'taison_inc', 'password' => '43Q9q3gFhq', 'dbname' => 'event'),
            'log'  => array('host' => 'staging-puzzle-db.cxmlqtgxkbsb.ap-northeast-1.rds.amazonaws.com', 'username' => 'taison_inc', 'password' => '43Q9q3gFhq', 'dbname' => 'log')
        );
        break;
    case 'production'://本番環境でのDB向き先設定
        $appDb = array(
            'user' => array('host' => 'db.local.puzzle-kingdom.com', 'username' => 'admin', 'password' => 'taisondb', 'dbname' => 'user'),
            'event'=> array('host' => 'db.local.puzzle-kingdom.com', 'username' => 'admin', 'password' => 'taisondb', 'dbname' => 'event'),
            'log'  => array('host' => 'db.local.puzzle-kingdom.com', 'username' => 'admin', 'password' => 'taisondb', 'dbname' => 'log')
        );
        break;
    default:
        throw new Exception('Where is your environment?');
}

try{
    $appDbh = array();
    foreach ($appDb as $key => $d) {
        $dsn = 'mysql:dbname='.$d["dbname"].';host='.$d["host"];
        $appDbh[$d["dbname"]] = new PDO($dsn, $d["username"], $d["password"]);
    }
    
}catch (PDOException $e){
    print('Connection failed:'.$e->getMessage());
    die();
}
*/
//return $db;




