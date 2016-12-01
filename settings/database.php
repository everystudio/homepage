<?php
//==================================
// DB向き先設定
//==================================
$env = $_SERVER['ENVIRONMENT'];

/*
$db = null;
switch($env) {
    case 'development'://開発環境でのDB向き先設定
        $db = array(
            "user_official" => array('host' => 'localhost', 'username' => 'app_user', 'password' => 'app_user', 'dbname' => 'user'),
        );
        break;
    case 'production'://本番環境でのDB向き先設定
        $db = array(
            "user_official" => array('host' => 'ip-10-0-2-30.ap-northeast-1.compute.internal', 'username' => 'app_user', 'password' => 'app_user', 'dbname' => 'user'),
        );
        break;
    default:
        throw new Exception('Where is your environment?');
}

try{
    $dbh = array();
    foreach ($db as $key => $d) {
        $dsn = 'mysql:dbname='.$d["dbname"].';host='.$d["host"];
        $dbh[$d["dbname"]] = new PDO($dsn, $d["username"], $d["password"]);
    }
    
}catch (PDOException $e){
    print('Connection failed:'.$e->getMessage());
    die();
}
*/





