<?php /* Smarty version 2.6.27, created on 2016-06-23 00:01:34
         compiled from ./templates/side_bar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', './templates/side_bar.tpl', 6, false),)), $this); ?>


<!-- サイドバー開始 -->
<div id="nav">

<?php if (((is_array($_tmp=$this->_tpl_vars['tpl_add'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp))): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_add'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<div class="section emphasis">

<h2>PHPの講座開始</h2>

<p>散々PHPの開発環境などを作ってきたのでそれのまとめとコードイグナイタを使った簡単なプログラム作成</p>

<h2>美少女ゲームをつくろう</h2>

<p><a href="./prodStoryGame/charaList">ギャルゲーのキャラクターデザインが続々と増えてますぞー</a></p>

</div>

<div class="section strong">

<h2>ブログをWordPressに載せ替えました</h2>

<p><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['activity'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">はてなブログを使っていたのですが、ワードプレスも使ってみようと思い、載せ替えました。</a></p>

</div>

<div class="section normal">

<h2>サポートエリア</h2>

<p>リリース予定のアプリは全国がサポートエリア！</p>

</div>

<div class="section normal contact">

<h2>お問い合わせ</h2>

反応は遅いですがツイッターなどもやってますのでこちらにどうぞ
<p><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['twitter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">twitter:watanabe@everystudio</a></p>

</div>

</div>
<!-- サイドバー終了 -->






