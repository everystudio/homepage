<?php /* Smarty version 2.6.27, created on 2015-04-16 15:48:15
         compiled from login/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'login/index.html', 4, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "./templates/header.tpl", 'smarty_include_vars' => array('title' => "パズルキングダム 公式サイト｜マイページ/ログイン画面",'keyword' => "パズルキングダム,パズル,アプリ,ゲーム,モンスター",'desciption' => "爽快パズルで白熱バトル!! パズルキングダム」は自由にドロップを動かして遊ぶ爽快3マッチパズルゲームです。コンボを決めて敵に大ダメージを与えよう!! キミだけのチームを作ろう!!登場キャラクターは総勢200体!!ダンジョンやガチャで新たなキャラをゲットしよう!!進化や合成を駆使してキミだけの最強チームを作ろう!! １分で遊べるミニゲームを実装!!短時間で遊べるミニゲームを楽しもう!!ミニゲーム第一弾は《爽快シューティング》パズルの後はシューティングで気分爽快!!",'no_script' => "【注意！！】このページでは、JavaScriptを使用していますので、JavaScriptを無効にしている場合、サイトが正常に機能しない可能性があります。<br />ブラウザの設定でJavaScriptを有効にしてください。<br />※設定方法につきましては、各ブラウザで異なるため、お手数ですが個別にご対応ください。",'header_id' => 0,'contents_title' => "マイページ")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- タイトル 本番 ここから //-->
								<img src = "<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/mypage/title_01.jpg" width = "100%" title = "ログイン画面" alt = "ログイン画面" />
<!-- タイトル ここまで //-->

<!-- パンくずリスト ここから //-->
								<div align = "left" class = "margin_02 float_left"><font class = "font_12">ログイン画面</font></div>
<!-- パンくずリスト ここまで //-->

<!-- 説明文 ここから //-->
									<div class = "margin_05 float_01" align = "left"><font class = "font_07"></font></div>
<!-- 説明文 ここまで //-->

<!-- ログイン フォーム ここから //-->
								<form name = "login" action = "<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['submit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" method = "post">
									<table border = "0" cellspacing = "0" cellpadding = "0" class = "table_02">
										<tr>
											<td class = "table_02_td">
												<table border = "0" cellspacing = "0" cellpadding = "0" class = "table_03">
													<tr>
														<td class = "table_dotline_01">
															<div class = "margin_03"><font class = "font_06">■メールアドレス：</font></div>
														</td>
														<td>
															<input type = "text" name = "form_1" class = "form_03 no_outline" />
														</td>
													</tr>
													<tr>
														<td colspan = "2">
															<hr class = "mypage" />
														</td>
													</tr>
													<tr>
														<td class = "table_dotline_01">
															<div class = "margin_03"><font class = "font_06">■パスワード：</font></div>
														</td>
														<td>
															<input type = "password" name = "form_2" class = "form_03 no_outline" />
														</td>
													</tr>
													<tr>
														<td colspan = "2">
															<div class = "margin_16"><font class = "font_07"><br />※パスワードを忘れた方は<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['foreget'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class = "link_04">こちら</a></font></div>
														</td>
													</tr>
													<tr>
														<td colspan = "2">
															<hr class = "mypage" />
														</td>
													</tr>
													<tr>
														<td colspan = "2">
															<div align = "center"><input type = "image" src = "<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/mypage/button_01.jpg" name="button_01" id="button_01" alt="ログイン" title = "ログイン" onClick = "this.form.submit()"; onmouseover="MM_swapImage('button_01','','<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/mypage/button_01_over.jpg',1)" onmouseout="MM_swapImgRestore()" class = "mypage_button_01" /></div>
														</td>
													</tr>
													<tr>
														<td colspan = "2">
															<div class = "mypage_button_01"><div class = "float_left margin_06"><input name = "login_check" type = "checkbox" value="true"></div><div class = "margin_02_2 float_left"><font class = "font_07">次回から自動でログインする</font></div></div>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</form>

<!-- ログイン フォーム ここまで //-->

<!-- 新規会員登録 ボタン ここから //-->
								<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['newcomer'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><img src = "<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/mypage/button_02.jpg" title = "新規会員登録" alt = "新規会員登録" name="button_02" id="button_02" onmouseover="MM_swapImage('button_02','','<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/mypage/button_02_over.jpg',1)" onmouseout="MM_swapImgRestore()" class = "mypage_button_02" /></a><div class = "margin_09"><div align = "left" class = "mypage_button_01"><font class = "font_07">▲まだ登録がお済みでない方はこちら</font></div></div>
<!-- 新規会員登録 ボタン ここまで //-->

							</div>

						</div></div>

<!-- 罫線 ここから //-->
						<div class = "contents_area_border_01_b visible-lg visible-md visible-sm"><div class = "float_left"><img src = "<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/frame_b_l.gif" title = "frame_b_l" alt = "frame_b_l" /></div>&nbsp;<div class = "float_right"><img src = "<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/frame_b_r.gif" title = "frame_b_r" alt = "frame_b_r" /></div></div>
<!-- 罫線 ここまで //-->

<!-- HOMEに戻る ここから //-->
						<script type = "text/javascript">official_top();</script>
<!-- HOMEに戻る ここまで //-->

<!-- PC ここまで //-->

<!-- スマートフォン ここから //-->
						<div class = "contents_area_border visible-xs">

<!-- タイトル ここから //-->
							<img src = "<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/sp/mypage/title_01.jpg" width = "100%" title = "ログイン画面" alt = "ログイン画面" />
<!-- タイトル ここまで //-->

<!-- ログイン フォーム ここから //-->
							<form name = "login_sp" action = "<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['submit'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" method = "post">
								<table border = "0" cellspacing = "0" cellpadding = "0" class = "table_03">
									<tr>
										<td>
											<hr class = "mypage" />
										</td>
									</tr>
									<tr>
										<td>
											<div align = "left"><font class = "font_06">■メールアドレス：</font></div>
										</td>
									</tr>
									<tr>
										<td>
											<input type = "text" name = "form_1_sp" class = "form_04 no_outline" />
										</td>
									</tr>
									<tr>
										<td>
											<hr class = "mypage" />
										</td>
									</tr>
									<tr>
										<td>
											<div align = "left"><font class = "font_06">■パスワード：</font></div>
										</td>
									</tr>
									<tr>
										<td>
											<input type = "password" name = "form_2_sp" class = "form_04 no_outline" />
										</td>
									</tr>
									<tr>
										<td>
											<div align = "left" class = "margin_09"><font class = "font_07">※パスワードを忘れた方は<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['foreget'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" class = "link_01">こちら</a></font></div>
										</td>
									</tr>
									<tr>
										<td>
											<hr class = "mypage" />
										</td>
									</tr>
									<tr>
										<td align = "center">
											<input type = "image" src = "<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/sp/mypage/button_01.jpg" name="button_01_sp" id="button_01_sp" alt="ログイン" title = "ログイン" onClick = "this.form.submit()"; onmouseover="MM_swapImage('button_01_sp','','<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/sp/mypage/button_01_over.jpg',1)" onmouseout="MM_swapImgRestore()" class = "mypage_button_01" />
										</td>
									</tr>
									<tr>
										<td>
											<div class = "mypage_button_01"><div class = "float_left"><input name = "login_check" type = "checkbox" value="true" class = "margin_0px"></div><div class = "margin_10 float_left"><font class = "font_07">次回から自動でログインする</font></div></div>
										</td>
									</tr>
									<tr>
										<td>
											<hr class = "mypage" />
										</td>
									</tr>
								</table>
							</form>
<!-- ログイン フォーム ここまで //-->

<!-- 新規会員登録 ボタン ここから //-->
							<div align = "left"><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['newcomer'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><img src = "<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/sp/mypage/button_02.jpg" title = "新規会員登録" alt = "新規会員登録" name="button_02_sp" id="button_02_sp" onmouseover="MM_swapImage('button_02_sp','','<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/sp/mypage/button_02_over.jpg',1)" onmouseout="MM_swapImgRestore()" class = "mypage_button_01" /></a><div align = "left" class = "mypage_button_01"><font class = "font_07">▲ まだ登録がお済みでない方はこちら</font></div></div>
<!-- 新規会員登録 ボタン ここまで //-->

<!-- スマートフォン ここまで //-->

						</div>

					</div>

					<div class = "float_01"></div>

				</div>
<!-- コンテンツ ここまで //-->

				<!--<div class = "contents_area_02 visible-lg visible-md visible-sm">

					<div class = "button_03">

						<a href = "/"><img src = "<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/back_top.jpg" width = "100%" alt="トップページに戻る" title = "トップページに戻る" name="contact_button_01" id="contact_button_01" onmouseover="MM_swapImage('contact_button_01','','<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/back_top_over.jpg',1)" onmouseout="MM_swapImgRestore()" onmouseup = "this.src = '<?php echo ((is_array($_tmp=$this->_tpl_vars['img'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/back_top.jpg'" /></a>

					</div>

				</div>//-->

			</div>
<!-- メインコンテンツ ここまで //-->

<!-- ページTOPに戻る ここから //-->
			<script type = "text/javascript">page_top();</script>
<!-- ページTOPに戻る ここまで //-->

<!-- HOMEに戻る ここから //-->
			<script type = "text/javascript">official_top_sp();</script>
<!-- HOMEに戻る ここまで //-->

		</div>

<!-- footer ここから //-->
		<script type = "text/javascript">Footer();</script>
<!-- footer ここまで //-->

	</body>

</html>