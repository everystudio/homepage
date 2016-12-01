<?php /* Smarty version 2.6.27, created on 2014-11-09 22:22:41
         compiled from gameAqb/element.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gameAqb/element.html', 10, false),)), $this); ?>
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

<div class="section emphasis">

<h2>手に入る素材とかのまとめ</h2>

<p>
	素材名を選択すると採取場所の説明に飛びます
</p>

<p><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['top'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">トップページに戻る</a></p>

</div>

<!-- メインカラム開始 -->
<div id="main">

<table border=1>

	<tr>
		<td width=10></td>
		<td>名前</td>
		<td>メモ</td>
		<td>カテゴリー</td>
	</tr>

<?php $_from = $this->_tpl_vars['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>

	<tr>
		<td></td>
		<td><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['link_detail'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['comment'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
		<td>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['cate1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

			<?php if (((is_array($_tmp=$this->_tpl_vars['data']['cate2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) != "なし"): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['cate2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
			<?php if (((is_array($_tmp=$this->_tpl_vars['data']['cate3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) != "なし"): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['cate3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
			<?php if (((is_array($_tmp=$this->_tpl_vars['data']['cate4'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) != "なし"): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['data']['cate4'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
		</td>
	</tr>

<?php endforeach; endif; unset($_from); ?>

</table>

</div>
<!-- メインカラム終了 -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/side_bar.tpl", 'smarty_include_vars' => array('tpl_add' => "./templates/side_bar_aqb.tpl")));
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