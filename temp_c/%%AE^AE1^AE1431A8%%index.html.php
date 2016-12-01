<?php /* Smarty version 2.6.27, created on 2015-10-10 19:57:34
         compiled from top/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'top/index.html', 10, false),)), $this); ?>
<html>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/header.tpl", 'smarty_include_vars' => array('title' => ($this->_tpl_vars['title']),'keyword' => "アプリ開発,Unity,AWS,アプリ攻略,ゲーム開発",'desciption' => "インディーズゲーム開発サークル「毎日工房」の公式サイトです。主にUnityを使ったアプリの開発に関する特集をお伝えします。また、ただアプリ開発の記事を載せるだけでなく、それに付随する通信処理の実装実装方法とその確認や、サーバーが動くインフラの設定までフォローアップします。一人で開発から運営まで行いたいかたはぜひチェックしてください！さらに他のアプリの攻略に関する特集も行っております。ご利用のアプリがある場合は是非情報を収集し、アプリ攻略位にお役立てください",'no_script' => "【注意！！】このページでは、JavaScriptを使用していますので、JavaScriptを無効にしている場合、サイトが正常に機能しない可能性があります。<br />ブラウザの設定でJavaScriptを有効にしてください。<br />※設定方法につきましては、各ブラウザで異なるため、お手数ですが個別にご対応ください。",'header_id' => 0,'contents_title' => "トップページ")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<link rel="stylesheet" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['css'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/style_01.css?ver=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" type="text/css" />

<body>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/body_top.tpl", 'smarty_include_vars' => array('use_opening' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<!-- コンテンツ開始 -->
<div id="content">

<div class="container">


<!-- メインカラム開始 -->
<div id="main">

<div class="section emphasis">

<h2>当サイトについて</h2>

<p>
このページは、「毎日工房」の公式サイトになります<br />
「毎日工房」ではゲームの開発・受注などをメインとして活動しております。<br />
ブログの方ではゲーム制作のためのノウハウやゲーム攻略に関する情報を掲載しています。
また、過去に制作したプロジェクトの配布やその制作に関するプログラムの説明なんかも行って参ります。<br />
<br />
最近ではUnityを使ったアプリ開発を行っており、サーバーとの通信処理や、インフラ側の設計なんかも
合わせて説明いたしますので、これからゲームを作りたい、フロントのみではなく運営まで見据えた
制作に興味があるかたなどの手助けになればと存じます。
</p>

</div>

<div class="section normal update">

<h2>新着情報</h2>

<dl class="clearFix">

<dt>2015/8/11</dt>
<dd>　本格始動</dd>

<dt>2014/12/13</dt>
<dd>　Unity/クラウドワークスを利用してギャルゲーを作り始める</dd>

<dt>2014/11/7</dt>
<dd>　SyntaxHighlighterを導入</dd>

<dt>2014/10/26</dt>
<dd>　過去プロジェクトシルエッタの公開</dd>

<dt>2014/10/26</dt>
<dd>　毎日工房公式サイトオープン</dd>

</dl>

</div>

<div class="section normal">

	<h2>開発中のゲームについて</h2>

	<p>現在はUnityを利用してデジゲー博に出すものを作成中です</p>

	<p>時間があまり取れなくて、こったものが用意できそうにないので、Oculus Riftを使ってそれっぽくごまかそうかと画策中</p>

</div>

<div class="section normal">

	<h2>メンテナンス情報</h2>

	<p>現在予定しているメンテナンスはございません</p>

	<p>というかサービス中のアプリもありません！</p>

</div>

</div>
<!-- メインカラム終了 -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/side_bar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<hr class="clear">

</div>

</div>
<!-- コンテンツ終了 -->


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



</body>

</html>









