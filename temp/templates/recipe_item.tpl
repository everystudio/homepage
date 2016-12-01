{*
*}

{if 0<$tpl_head}
	<tr>
		<td align="center">レア度</td>
		<td align="center">名前</td>
		<td align="center">説明</td>
		<td align="center">必要素材(名前:品質:数)</td>
	</tr>
{else}
	<tr>
		<td align="center">{$tpl_recipe.rarity}</td>
		<td>{$tpl_recipe.name}</td>
		<td>{$tpl_recipe.comment}</td>
		<td>
			<a href="{$tpl_recipe.link1}">{$tpl_recipe.item1}</a>:{$tpl_recipe.quality1}:{$tpl_recipe.num1}
			<br /><a href="{$tpl_recipe.link2}">{$tpl_recipe.item2}</a>:{$tpl_recipe.quality2}:{$tpl_recipe.num2}
			{if $tpl_recipe.item3 != "なし"}<br /><a href="{$tpl_recipe.link3}">{$tpl_recipe.item3}</a>:{$tpl_recipe.quality3}:{$tpl_recipe.num3}{/if}
			{if $tpl_recipe.item4 != "なし"}<br /><a href="{$tpl_recipe.link4}">{$tpl_recipe.item4}</a>:{$tpl_recipe.quality4}:{$tpl_recipe.num4}{/if}
		</td>
	</tr>
{/if}






