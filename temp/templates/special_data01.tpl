{*
*}

{if 0<$tpl_head}
	<tr>
		<td align="center">名前</td>
		<td align="center">説明</td>
		<td align="center">合成特性</td>
	</tr>
{else}
	<tr>
		<td>
			{if $tpl_special.id==-1}
			△
			{else}
			<a href="{$tpl_special.link}">
			{/if}
			{$tpl_special.name}
			{if $tpl_special.id==-1}
			{else}
			</a>
			{/if}
		</td>
		<td>{$tpl_special.comment}</td>
		<td>
			{if $tpl_special.combi1 != "なし"}
			<a href="{$tpl_special.link1}">{$tpl_special.combi1}</a>
			<br /><a href="{$tpl_special.link2}">{$tpl_special.combi2}</a>
			{else}
			なし
			{/if}
		</td>
	</tr>
{/if}






