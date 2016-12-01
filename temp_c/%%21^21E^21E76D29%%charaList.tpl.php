<?php /* Smarty version 2.6.27, created on 2015-01-04 01:48:43
         compiled from ./prodStoryGame/charaList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', './prodStoryGame/charaList.tpl', 3, false),)), $this); ?>


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
<div class="section normal" id="noteSection">
<table border=1>
<?php $_from = $this->_tpl_vars['character_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['data']):
        $this->_foreach['foo']['iteration']++;
?>
	<?php $this->assign('loop_count', ((is_array($_tmp=$this->_foreach['foo']['iteration']-1)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))); ?>

	<?php if (((is_array($_tmp=$this->_tpl_vars['loop_count']%3)) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) == 0): ?>
	<tr>
	<?php endif; ?>
	<td align=center>
	<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['link_detail'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
	<img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/StoryGame/<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_face.png"><br />
	<small>(<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['family_name_kana'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
　<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['first_name_kana'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)</small><br />
	<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['family_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
　<?php echo ((is_array($_tmp=$this->_tpl_vars['data']['first_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<br />
	</a>

	</td>

	<?php if (( ((is_array($_tmp=$this->_foreach['foo']['iteration'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) ) % 3 == 0): ?>
	<tr>
	<?php elseif (((is_array($_tmp=($this->_foreach['foo']['iteration'] == $this->_foreach['foo']['total']))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>
	<tr>
	<?php endif; ?>


<?php endforeach; endif; unset($_from); ?>
</table>

</div>

<!-- メインカラム終了 -->

