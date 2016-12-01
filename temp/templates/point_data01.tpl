{*
	検証結果のところのプライズデータを表示
*}
<tr>
	<td width="{$tpl_width}" >
		<font class = "{$tpl_font_style}">
			{*
			ite:{$smarty.foreach.loop.iteration}
			■{$tpl_log.lot_id}:{$tpl_log.prize_id}
			*}
		</font>
		<font class = "{$tpl_font_style}">
				{$tpl_log.name} 
				{$tpl_log.point_name}を{$tpl_log.point}ポイント使用<br />
				{$tpl_log.createtime}
		</font>
	</td>
</tr>





