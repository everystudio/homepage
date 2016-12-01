<?php /* Smarty version 2.6.27, created on 2015-09-24 23:47:51
         compiled from ./templates/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', './templates/header.tpl', 4, false),)), $this); ?>
<head>

<!-- タイトル ここから //-->
	<title><?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</title>
<!-- タイトル ここまで //-->

<!-- メタタグ ここから //-->
	<meta name = "viewport" content = "width = device-width,initial-scale=1.0" />
	<meta http-equiv="content-language" content="ja" />
<!-- ここで指定した文字コードがブラウザのデフォルト設定になるので、ファイルの文字コードに合わせて指定する //-->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-style-Type" content="text/css" />
	<meta name="keywords" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['keyword'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
	<meta name="description" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['desciption'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
	<meta name="author" content="every-studio.com" />
<!-- メタタグ ここまで //-->

<!-- Favicon http://ao-system.net/alphaicon/←このサイトで制作可能 ここから //-->
	<link rel="shortcut icon" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/favicon.ico" />
<!-- Favicon ここまで //-->

<!-- Bootstrap ここから -->
<!-- 表示するデバイスについては、classで指定可能 visible-lg PC visible-md タブレットPC visible-sm タブレットPC visible-xs スマートフォン //-->
	<link href="<?php echo ((is_array($_tmp=$this->_tpl_vars['css'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/bootstrap.css?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" rel="stylesheet" />
<!-- Bootstrap ここまで -->

<!-- JavaScript ここから //-->
	<script src="<?php echo ((is_array($_tmp=$this->_tpl_vars['scripts'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/template.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" language="JavaScript" type="text/javascript"></script>
	<script src="<?php echo ((is_array($_tmp=$this->_tpl_vars['scripts'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/library.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" language="JavaScript" type="text/javascript"></script>
	<script src="<?php echo ((is_array($_tmp=$this->_tpl_vars['scripts'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/jquery.page-scroller-309.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" language="JavaScript" type="text/javascript"></script>

<!-- SyntaxHighlighter -->
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shCore.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushBash.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushCpp.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushCSharp.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushCss.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushDelphi.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushDiff.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushGroovy.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushJava.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushJScript.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushPhp.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushPlain.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushPython.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushRuby.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushScala.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushSql.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushVb.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/shBrushXml.js?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></script>
	<link type="text/css" rel="stylesheet" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/styles/shCore.css?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
	<link type="text/css" rel="stylesheet" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/styles/shThemeDjango.css?var=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"/>
	<script type="text/javascript">
		SyntaxHighlighter.config.clipboardSwf = "<?php echo ((is_array($_tmp=$this->_tpl_vars['syntaxHighlighter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/scripts/clipboard.swf";
		SyntaxHighlighter.all();
	</script>
<!-- SyntaxHighlighter -->


<?php if (((is_array($_tmp=$this->_tpl_vars['enviroment'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)) == 'production'): ?>
<?php echo '
<script type="text/javascript">
	(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

	ga(\'create\', \'UA-56121838-1\', \'auto\');
	ga(\'require\', \'displayfeatures\');
	ga(\'send\', \'pageview\');
</script>
'; ?>

<?php endif; ?>


<!-- JavaScript ここまで //-->


</head>