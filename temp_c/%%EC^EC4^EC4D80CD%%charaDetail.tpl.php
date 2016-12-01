<?php /* Smarty version 2.6.27, created on 2015-01-04 01:48:46
         compiled from ./prodStoryGame/charaDetail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', './prodStoryGame/charaDetail.tpl', 4, false),)), $this); ?>


<h2>
	名前：<?php echo ((is_array($_tmp=$this->_tpl_vars['character_data']['family_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
　<?php echo ((is_array($_tmp=$this->_tpl_vars['character_data']['first_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
(<?php echo ((is_array($_tmp=$this->_tpl_vars['character_data']['family_name_kana'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
　<?php echo ((is_array($_tmp=$this->_tpl_vars['character_data']['first_name_kana'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
)
</h2>
<br />

<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/StoryGame/<?php echo ((is_array($_tmp=$this->_tpl_vars['character_data']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['character_data']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_info.jpg">
<img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/StoryGame/<?php echo ((is_array($_tmp=$this->_tpl_vars['character_data']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['character_data']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
_info.jpg" width=100%>
</a>

キャラクター原案：<?php echo ((is_array($_tmp=$this->_tpl_vars['character_data']['designer'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>


<p></p>

<p><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['back'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">キャラクター一覧に戻る</a></p>

</div>
<div class="section normal" id="noteSection">
</div>


<!-- メインカラム終了 -->

