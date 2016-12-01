{*
	検証結果のところのプライズデータを表示
*}
<tr>
	<td width="{$tpl_width}" >
		<div class = "margin_04 float_left">
			<font class = "font_06">
				{*
				ite:{$smarty.foreach.loop.iteration}
				■{$tpl_prize.lot_id}:{$tpl_prize.prize_id}
				*}
			</font>
			<div class = "margin_01">
				<font class = "font_07">
					{$tpl_prize.lot_name}に応募しました<br />
					応募日時：{$tpl_prize.str_createtime}<br />

					{if 2 == $tpl_prize.state}
						{if 0 < $tpl_prize.prize_id}
							{$tpl_prize.data.name}:{$tpl_prize.data.desc}
						{else}
							なし
						{/if}
					{elseif 1 == $tpl_prize.state}
					受付済み。結果が出るまでしばらくお待ち下さい
					{elseif 0 == $tpl_prize.state}
					{/if}
				</font>
			</div>
		</div>
	</td>
</tr>





