<?php /* Smarty version 2.6.27, created on 2014-11-04 22:00:25
         compiled from ./templates/special_data01.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', './templates/special_data01.tpl', 4, false),)), $this); ?>

<?php if (0 < ((is_array($_tmp=$this->_tpl_vars['tpl_head'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>
	<tr>
		<td align="center">名前</td>
		<td align="center">説明</td>
		<td align="center">合成特性</td>
	</tr>
<?php else: ?>
	<tr>
		<td>
			<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_special']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) == -1): ?>
			△
			<?php else: ?>
			<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_special']['link'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
			<?php endif; ?>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_special']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

			<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_special']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) == -1): ?>
			<?php else: ?>
			</a>
			<?php endif; ?>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_special']['comment'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
		<td>
			<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_special']['combi1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) != "なし"): ?>
			<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_special']['link1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_special']['combi1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
			<br /><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_special']['link2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_special']['combi2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>
			<?php else: ?>
			なし
			<?php endif; ?>
		</td>
	</tr>
<?php endif; ?>





