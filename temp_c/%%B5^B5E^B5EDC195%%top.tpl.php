<?php /* Smarty version 2.6.27, created on 2015-01-04 01:48:41
         compiled from ./prodStoryGame/top.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', './prodStoryGame/top.tpl', 3, false),)), $this); ?>


<h1 class="pageTitle"><?php echo ((is_array($_tmp=$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

<div class="section emphasis">

<h2>
ここでは、
<a href="https://crowdworks.jp">クラウドワークス</a>を利用してギャルゲーをつくれるか？という企画を実行中
</h2>

<p>
キャラクターデザインからシステムまで、基本的にクラウドワークスを利用して作られたものを使ってゲームを仕上げるのが目標です。
あとは足りない部分のプログラムを少々。<br />
Unityを利用して作る予定
</p>

<p><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['top'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">トップページに戻る</a></p>

</div>

<?php $_from = $this->_tpl_vars['data_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
<div class="section normal" id="noteSection">

<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h2>

<p><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['comment'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>

<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['link'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">→制作詳細はこちら</a>

<hr>
</div>

<?php endforeach; endif; unset($_from); ?>

<!-- メインカラム終了 -->

