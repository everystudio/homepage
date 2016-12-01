<?php /* Smarty version 2.6.27, created on 2014-10-31 00:55:57
         compiled from ./templates/recipe_item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', './templates/recipe_item.tpl', 4, false),)), $this); ?>

<?php if (0 < ((is_array($_tmp=$this->_tpl_vars['tpl_head'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>
	<tr>
		<td align="center">レア度</td>
		<td align="center">名前</td>
		<td align="center">説明</td>
		<td align="center">必要素材(名前:品質:数)</td>
	</tr>
<?php else: ?>
	<tr>
		<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['rarity'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['comment'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
		<td>
			<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['link1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['item1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>:<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['quality1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['num1'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

			<br /><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['link2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['item2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>:<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['quality2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['num2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

			<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['item3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) != "なし"): ?><br /><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['link3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['item3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>:<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['quality3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['num3'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
			<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['item4'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) != "なし"): ?><br /><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['link4'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['item4'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a>:<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['quality4'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
:<?php echo ((is_array($_tmp=$this->_tpl_vars['tpl_recipe']['num4'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<?php endif; ?>
		</td>
	</tr>
<?php endif; ?>





