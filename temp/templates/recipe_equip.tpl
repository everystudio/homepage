{*
	確かコメントだったかな
*}

{if 0<$tpl_head}
	<tr>
		<td>レア度</td>
		<td>名前</td>
		<td>装備可能<br />キャラ</td>
		<td>必要素材(名前:品質orLevel:数)</td>
		<td>コスト</td>
		<td>パラメータ</td>
	</tr>
{else}
	<tr>
		<td>{$tpl_recipe.rarity}</td>
		<td>{$tpl_recipe.name}</td>
		<td>{$tpl_recipe.equip}</td>
		<td>
			<a href="{$tpl_recipe.link1}">{$tpl_recipe.item1}</a>:{$tpl_recipe.quality1}:{$tpl_recipe.num1}
			<br /><a href="{$tpl_recipe.link2}">{$tpl_recipe.item2}</a>:{$tpl_recipe.quality2}:{$tpl_recipe.num2}
			{if $tpl_recipe.item3 != "なし"}<br /><a href="{$tpl_recipe.link3}">{$tpl_recipe.item3}</a>:{$tpl_recipe.quality3}:{$tpl_recipe.num3}{/if}
			{if $tpl_recipe.item4 != "なし"}<br /><a href="{$tpl_recipe.link4}">{$tpl_recipe.item4}</a>:{$tpl_recipe.quality4}:{$tpl_recipe.num4}{/if}
		</td>
		<td>
			{$tpl_recipe.cost}
		</td>
		<td>
			{if $tpl_recipe.atk!=0}攻撃力{$tpl_recipe.atk}{/if}
			{if $tpl_recipe.def!=0}防御力{$tpl_recipe.def}{/if}
			{if $tpl_recipe.hp!=0}HP{$tpl_recipe.hp}{/if}
			{if $tpl_recipe.col!=0}採取{$tpl_recipe.col}{/if}
		</td>
		
	</tr>

{/if}




