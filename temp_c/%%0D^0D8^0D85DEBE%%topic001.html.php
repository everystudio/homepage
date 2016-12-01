<?php /* Smarty version 2.6.27, created on 2014-11-09 22:15:18
         compiled from devUnityTop/topic001.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'devUnityTop/topic001.html', 10, false),)), $this); ?>
<html>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/header.tpl", 'smarty_include_vars' => array('title' => ($this->_tpl_vars['title']),'keyword' => "アプリ開発,Unity,AWS,アプリ攻略,ゲーム開発",'desciption' => "インディーズゲーム開発サークル「毎日工房」の公式サイトです。主にUnityを使ったアプリの開発に関する特集をお伝えします。また、ただアプリ開発の記事を載せるだけでなく、それに付随する通信処理の実装実装方法とその確認や、サーバーが動くインフラの設定までフォローアップします。一人で開発から運営まで行いたいかたはぜひチェックしてください！さらに他のアプリの攻略に関する特集も行っております。ご利用のアプリがある場合は是非情報を収集し、アプリ攻略位にお役立てください",'no_script' => "【注意！！】このページでは、JavaScriptを使用していますので、JavaScriptを無効にしている場合、サイトが正常に機能しない可能性があります。<br />ブラウザの設定でJavaScriptを有効にしてください。<br />※設定方法につきましては、各ブラウザで異なるため、お手数ですが個別にご対応ください。",'header_id' => 0,'contents_title' => "トップページ")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<link rel="stylesheet" href="<?php echo ((is_array($_tmp=$this->_tpl_vars['css'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/style_unity_topic.css?ver=<?php echo ((is_array($_tmp=$this->_tpl_vars['timeserial'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" type="text/css" />
<body>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/body_top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- コンテンツ開始 -->
<div>

<center>
	<font size=20>複数のAudioListenerがある場合のログ対応</font>

	<table width=90% border=1>
		<tr>
			<td>

Unityで誰かの作業をマージしたりしたタイミングで
<pre class="brush: c-sharp;">
<?php echo '
There are 2 audio listeners in the scene. Please ensure there is always exactly one audio listener in the scene.
'; ?>

</pre>
こーんなエラーが出てしまった・・・。<br />
そもそもオーディオリスナーというのが基本的に複数存在を許さないようなたぐいのものなのです。<br />
詳しくはこんな感じ<br />
<br />
<a href="http://docs-jp.unity3d.com/Documentation/Components/class-AudioListener.html">Unity オーディオリスナー/Audio Listener</a><br />
<br />


改善方法としてはシーン内にあるオーディオリスナーはひとつであってほしい、との事なのでメインカメラじゃなさそうなやつを外すのが手っ取り早いです<br />
<br />
オーディオリスナーはだいたいカメラに付いているのでシーン内のカメラを探すと見つかると思います。<br />
うちの場合はどうやら最近追加したD3Cameraにくっついてたみたいです。<br />
<p><img src="http://cdn-ak.f.st-hatena.com/images/fotolife/m/mainitiamai/20141106/20141106123443.png" alt="f:id:mainitiamai:20141106123443p:plain" title="f:id:mainitiamai:20141106123443p:plain" class="hatena-fotolife" itemprop="image"></p>
とりあえず赤まるの部分のチェックボックスを外してやるとログは収まります。<br />
RemoveComponentしてもいいのですが、他の方と制作している場合は消すといろいろと不具合につながることもある(GetComponentのエラーなど)ので、とりあえず非アクティブにしてしまうのが良いと思います。<br />

			</td>
		</tr>

		<tr>
			<td>
				<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['dev_unity_top'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">→Unityトップへ</a>
			</td>
		</tr>
	</table>
</center>
<br />

</div>
<!-- コンテンツ終了 -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


</body>
</html>


















































































