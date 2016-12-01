<?php /* Smarty version 2.6.27, created on 2014-11-09 22:15:12
         compiled from ./templates/body_top.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', './templates/body_top.tpl', 19, false),)), $this); ?>


<!-- ヘッダ開始 -->
<div id="header">

<div class="container">

<h1 class="siteTitle">毎日工房</h1>

<p class="catch"><strong>フロントからインフラまで</strong></p>

<ul class="guide">
<li class="first"><a href="#">FAQ</a></li>
<li><a href="#">サイトマップ</a></li>
</ul>

<?php if (0 < ((is_array($_tmp=$this->_tpl_vars['use_opening'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>
<div class="opening">

<h2><img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/top_title.png" alt="毎日工房" width="880" height="260"></h2>

</div>
<?php endif; ?>
<center>
<ul class="nl clearFix">
<li class="first"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['top'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">ホーム</a></li>
<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['develop'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">開発</a></li>
<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['product'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">制作</a></li>
<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['activity'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">活動/ブログ</a></li>
<li><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['capture'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">ゲーム攻略</a></li>
<li class="last"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['question'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">お問い合わせ</a></li>
</ul>
</center>
<hr class="none">

</div>

</div>
<!-- ヘッダ終了 -->









