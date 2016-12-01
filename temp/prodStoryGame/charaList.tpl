

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
<div class="section normal" id="noteSection">
<table border=1>
{foreach from=$character_list|smarty:nodefaults item=data name=foo}
	{assign var=loop_count value=$smarty.foreach.foo.iteration-1}

	{if $loop_count%3==0}
	<tr>
	{/if}
	<td align=center>
	<a href="{$data.link_detail}">
	<img src="{$img}/StoryGame/{$data.name}/{$data.name}_face.png"><br />
	<small>({$data.family_name_kana}　{$data.first_name_kana})</small><br />
	{$data.family_name}　{$data.first_name}<br />
	</a>

	</td>

	{if ($smarty.foreach.foo.iteration)%3==0 }
	<tr>
	{elseif $smarty.foreach.foo.last}
	<tr>
	{/if}


{/foreach}
</table>

</div>

<!-- メインカラム終了 -->


