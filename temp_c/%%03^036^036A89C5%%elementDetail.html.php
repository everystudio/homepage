<?php /* Smarty version 2.6.27, created on 2015-05-21 00:04:23
         compiled from gameAqb/elementDetail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'gameAqb/elementDetail.html', 10, false),)), $this); ?>
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

<h2>素材からの逆引き</h2>
<p>
	素材から錬金できるもの一覧などを調べることができます。<br />
	私が確認できたものや、どこかに載ってるのを鵜呑みにして載せている場合がありますので、錬金の際はもろもろご確認をお願いします
</p>

<p><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['top'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">トップページに戻る</a></p>

</div>

<!-- メインカラム開始 -->
<div >
<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['element']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h2>
<center>
</center>

<div class="section emphasis">

<table border=1>

	<tr>
		<td width=10></td>
		<td>名前</td>
		<td>メモ</td>
		<td>カテゴリー</td>
	</tr>

	<tr>
		<td></td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['element']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['element']['comment'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
		<td>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['element']['cate1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

			<?php if (((is_array($_tmp=$this->_tpl_vars['element']['cate2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) != "なし"): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['element']['cate2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
			<?php if (((is_array($_tmp=$this->_tpl_vars['element']['cate3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) != "なし"): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['element']['cate3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
			<?php if (((is_array($_tmp=$this->_tpl_vars['element']['cate4'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) != "なし"): ?>, <?php echo ((is_array($_tmp=$this->_tpl_vars['element']['cate4'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
		</td>
	</tr>

</table>
</div>

<hr>

<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['element_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
で錬金できるもの</h2>
<center>
</center>
<div class="section emphasis">


<h3>アイテム系</h3>
<?php if (0 < ((is_array($_tmp=$this->_tpl_vars['item_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>
<table border=1>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/recipe_item.tpl", 'smarty_include_vars' => array('tpl_head' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $_from = $this->_tpl_vars['item_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/recipe_item.tpl", 'smarty_include_vars' => array('tpl_recipe' => ((is_array($_tmp=$this->_tpl_vars['data'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endforeach; endif; unset($_from); ?>
</table>
<br />　
<?php else: ?>
見つけられませんでした<br />　
<?php endif; ?>
</div>

<div class="section emphasis">


<h3>装備系</h3>
<?php if (0 < ((is_array($_tmp=$this->_tpl_vars['equip_num'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>
<table border=1>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/recipe_equip.tpl", 'smarty_include_vars' => array('tpl_head' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php $_from = $this->_tpl_vars['equip_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/recipe_equip.tpl", 'smarty_include_vars' => array('tpl_recipe' => ((is_array($_tmp=$this->_tpl_vars['data'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endforeach; endif; unset($_from); ?>
</table>
<br />　
<?php else: ?>
見つけられませんでした<br />　
<?php endif; ?>
</div>

<center>
	<font color=black>
	<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['aqb_element'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">素材一覧</a>・<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['aqb_recipe'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">レシピ一覧</a>
	</font>

</center>

</div>
<!-- メインカラム終了 -->




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