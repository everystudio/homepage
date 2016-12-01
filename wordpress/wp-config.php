<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、言語、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86 
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'wordpress');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'wordpress');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'wordpress');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'wMH*N/fYnn%%y?XM(BsnNl]nn|S[[hBH*N+uIsHpI@R~^pm?P67xPnXLt?~he=Z9');
define('SECURE_AUTH_KEY',  'K`:er(g&C4#O5^!B=ipFm2+OEHftMS:G|OVLqzME|-#D++R]@%*VG[+DYK,W C3.');
define('LOGGED_IN_KEY',    '4oEL -Hdc]:>5$Og*^Zkuh*}<b+x{H-5ze&w4@x39 CrTqu*1tRWV+u9}]E2<fOb');
define('NONCE_KEY',        'sl?e_;m[2/&4Lqt]cq/fqK[;+/@1xg++-,vH+]F%( oU5q)|e!dB9HA.)FWhnzYa');
define('AUTH_SALT',        'd;@Q+t-Q`7$u@=RZWfEQM8h>g>uQ]nXs-N+@wq;^-PP9 )+?^lob7+T*CNSj:<6x');
define('SECURE_AUTH_SALT', 'QGA)}2AL&0W]t[QqbsMp6B`:y|Ve_o<>2*)|+ycN7A]G8(~0/(g+X5*r-M@+6sRY');
define('LOGGED_IN_SALT',   '3Zr=ej+8WtJVfu|mLQ93QcCuV>-7Sc<p,bpA(M(@OT1QK!A1[+FC^&Wg;%-R6ay ');
define('NONCE_SALT',       '(<#<R!OK^akT/#STM_4^5EJ?.<+ZYAqT4H^h(LD:mu%[z ?Z*PQHs-lFM~E]j|X[');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') ){
	define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


