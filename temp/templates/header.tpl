<head>

<!-- タイトル ここから //-->
	<title>{$title}</title>
<!-- タイトル ここまで //-->

<!-- メタタグ ここから //-->
	<meta name = "viewport" content = "width = device-width,initial-scale=1.0" />
	<meta http-equiv="content-language" content="ja" />
<!-- ここで指定した文字コードがブラウザのデフォルト設定になるので、ファイルの文字コードに合わせて指定する //-->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-style-Type" content="text/css" />
	<meta name="keywords" content="{$keyword}" />
	<meta name="description" content="{$desciption}" />
	<meta name="author" content="every-studio.com" />
<!-- メタタグ ここまで //-->

<!-- Favicon http://ao-system.net/alphaicon/←このサイトで制作可能 ここから //-->
	<link rel="shortcut icon" href="{$img}/favicon.ico" />
<!-- Favicon ここまで //-->

<!-- Bootstrap ここから -->
<!-- 表示するデバイスについては、classで指定可能 visible-lg PC visible-md タブレットPC visible-sm タブレットPC visible-xs スマートフォン //-->
	<link href="{$css}/bootstrap.css?var={$timeserial}" rel="stylesheet" />
<!-- Bootstrap ここまで -->

<!-- JavaScript ここから //-->
	<script src="{$scripts}/template.js?var={$timeserial}" language="JavaScript" type="text/javascript"></script>
	<script src="{$scripts}/library.js?var={$timeserial}" language="JavaScript" type="text/javascript"></script>
	<script src="{$scripts}/jquery.page-scroller-309.js?var={$timeserial}" language="JavaScript" type="text/javascript"></script>

<!-- SyntaxHighlighter -->
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shCore.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushBash.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushCpp.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushCSharp.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushCss.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushDelphi.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushDiff.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushGroovy.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushJava.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushJScript.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushPhp.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushPlain.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushPython.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushRuby.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushScala.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushSql.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushVb.js?var={$timeserial}"></script>
	<script type="text/javascript" src="{$syntaxHighlighter}/scripts/shBrushXml.js?var={$timeserial}"></script>
	<link type="text/css" rel="stylesheet" href="{$syntaxHighlighter}/styles/shCore.css?var={$timeserial}"/>
	<link type="text/css" rel="stylesheet" href="{$syntaxHighlighter}/styles/shThemeDjango.css?var={$timeserial}"/>
	<script type="text/javascript">
		SyntaxHighlighter.config.clipboardSwf = "{$syntaxHighlighter}/scripts/clipboard.swf";
		SyntaxHighlighter.all();
	</script>
<!-- SyntaxHighlighter -->


{if $enviroment == "production"}
{literal}
<script type="text/javascript">
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-56121838-1', 'auto');
	ga('require', 'displayfeatures');
	ga('send', 'pageview');
</script>
{/literal}
{/if}


<!-- JavaScript ここまで //-->


</head>