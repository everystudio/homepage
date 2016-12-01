<?php
//==================================
// smarty設定
//==================================
$env = $_SERVER['ENVIRONMENT'];
$env_int = 0;
switch($env) {
case 'development'://開発環境でのキャッシュ向き先設定
	$smartyDir = '/usr/share/php/Smarty/Smarty.class.php';
	$env_int = 0;
	break;
case 'staging'://ステージング
	$smartyDir = '/var/www/html/pk_official_page/Smarty/libs/Smarty.class.php';
	$env_int = 1;
	break;
case 'production'://本番環境
	$smartyDir = '/var/www/html/pk_official_page/Smarty/libs/Smarty.class.php';
	$env_int = 2;
	break;
default:
	// unknown
	break;
}
$smartyDir = '/var/www/html/settings/Smarty/Smarty.class.php';

require_once($smartyDir);

$smarty = new Smarty();
$smarty->template_dir = __DIR__ . '/../temp/';
$smarty->compile_dir  = __DIR__ . '/../temp_c/';
$smarty->config_dir   = __DIR__ . '/../config/';
$smarty->cache_dir    = __DIR__ . '/../cache/';

$smarty->default_modifiers = array('escape');

if( $env == 'development'){
	$smarty->compile_check = true;
}

// 本番・ステージ環境で筋が通る相対パス(何か納得いかないけどとりあえずこれでパスは通りそう)
$smarty->assign( 'env' , $env_int );
$smarty->assign( 'enviroment' , $env );
$smarty->assign( 'img'      , '/images' );
$smarty->assign( 'resources', '/resources' );
$smarty->assign( 'css'      , '/temp/css' );
$smarty->assign( 'scripts'  , '/temp/scripts' );

$dt = new DateTime();
$use_time = $dt->format('His');


$smarty->assign( "timeserial" , $use_time );
//$smarty->assign( 'syntaxHighlighter' , '/plugin/syntaxhighlighter_2.0.278');

$smarty->assign( 'syntaxHighlighter' , '/plugin/syntaxhighlighter_3.0.83');
$smarty->assign( 'syntaxHighlighter' , '/plugin/syntaxhighlighter_2.1.364');


