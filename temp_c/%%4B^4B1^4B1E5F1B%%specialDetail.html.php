<?php /* Smarty version 2.6.27, created on 2014-11-14 04:25:16
         compiled from gameAqb/specialDetail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gameAqb/specialDetail.html', 10, false),)), $this); ?>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/body_top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- コンテンツ開始 -->
<div id="content">

<div class="container">


<!-- メインカラム開始 -->
<div id="main">

<h1 class="pageTitle"><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="section emphasis">


<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['select_special']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h2>

<p>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['select_special']['comment'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

</p>

<?php if (((is_array($_tmp=$this->_tpl_vars['select_special']['combi1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) != "なし"): ?>
合成特性の元
<table border=1>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/special_data01.tpl", 'smarty_include_vars' => array('tpl_head' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php $_from = $this->_tpl_vars['special_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/special_data01.tpl", 'smarty_include_vars' => array('tpl_special' => ((is_array($_tmp=$this->_tpl_vars['data'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endforeach; endif; unset($_from); ?>
</table>
△：はロロナのアトリエを参考にして書いております。多分あるんじゃないかなという予想。

<?php endif; ?>

<p><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['aqb_special'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">特性一覧に戻る</a></p>

</div>

<div class="section normal" id="noteSection">
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