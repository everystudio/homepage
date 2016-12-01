

<h1 class="pageTitle">{$page_title}</h1>

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

<p><a href="{$link.top}">トップページに戻る</a></p>

</div>

{foreach from=$data_list|smarty:nodefaults item=data}
<div class="section normal" id="noteSection">

<h2>{$data.name}</h2>

<p>{$data.comment}</p>

<a href="{$data.link}">→制作詳細はこちら</a>

<hr>
</div>

{/foreach}

<!-- メインカラム終了 -->


