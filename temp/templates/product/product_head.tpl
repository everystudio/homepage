<html>

{include file="./templates/header.tpl" title=`$title` 
	keyword="アプリ開発,Unity,AWS,アプリ攻略,ゲーム開発" 
	desciption="インディーズゲーム開発サークル「毎日工房」の公式サイトです。主にUnityを使ったアプリの開発に関する特集をお伝えします。また、ただアプリ開発の記事を載せるだけでなく、それに付随する通信処理の実装実装方法とその確認や、サーバーが動くインフラの設定までフォローアップします。一人で開発から運営まで行いたいかたはぜひチェックしてください！さらに他のアプリの攻略に関する特集も行っております。ご利用のアプリがある場合は是非情報を収集し、アプリ攻略位にお役立てください" 
	no_script = "【注意！！】このページでは、JavaScriptを使用していますので、JavaScriptを無効にしている場合、サイトが正常に機能しない可能性があります。<br />ブラウザの設定でJavaScriptを有効にしてください。<br />※設定方法につきましては、各ブラウザで異なるため、お手数ですが個別にご対応ください。" 
	header_id = 0 
	contents_title = "トップページ" }

<link rel="stylesheet" href="{$css}/style_01.css?ver={$timeserial}" type="text/css" />

<body>

{include file="./templates/body_top.tpl" }

<!-- コンテンツ開始 -->
<div id="content">

<div class="container">


<!-- メインカラム開始 -->
<div id="main">

<h1 class="pageTitle">{$page_title}</h1>

<div class="section emphasis">

<!-- ここに内容を追加 -->

{include file=`$template_name`}











</div>
<!-- メインカラム終了 -->

{include file="./templates/side_bar.tpl" }




<hr class="clear">

</div>

</div>
<!-- コンテンツ終了 -->

{include file="./templates/footer.tpl" }


</body>
</html>








