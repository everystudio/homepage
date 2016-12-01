<?php

// 環境設定
if(file_exists('/var/www/.env')) {
	$_SERVER['ENVIRONMENT'] = trim(file_get_contents('/var/www/.env'));
}

if (! isset($_SERVER['ENVIRONMENT'])) {
	$_SERVER['ENVIRONMENT'] = 'production';
}

// データベースの設定
//$db = include __DIR__.'/database.php';
$root_dir = "/var/www/html";

// スマーティの設定
$config['smarty'] = array(
        'smartyDir' => $root_dir.'/settings/Smarty/',
        'templateDir'      => $root_dir . '/temp/',
        'compileDir'       => $root_dir . '/temp_c/',
        'configDir'     => $root_dir . '/config/',
        'cacheDir'     => $root_dir . '/cache/'
    );

// 認証キー
$config['accept_key'] = "9bpit7fhks9z4cdyp2k7nphnetbn6bfg";

$config['csvDir'] = $root_dir.'/csv/';

$env = $_SERVER['ENVIRONMENT'];

?>












