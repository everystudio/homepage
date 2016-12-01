<?php /* Smarty version 2.6.27, created on 2015-01-22 00:04:48
         compiled from ./prodStoryGame/scenarioEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', './prodStoryGame/scenarioEdit.tpl', 11, false),)), $this); ?>


<h2>
	サンプルアプリをダウンロードしてシナリオを作成する方法
</h2>
マニュアルのページはちょっとずつ改良してゆきます
<br />
<br />

１．アプリをダウンロードします<br />
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['resources'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/story_game.zip" title="Windows用テスト用の実行ファイル">
テスト用実行ファイルfor Win</a><br />
<a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['resources'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/story_game.app.zip" title="Mac用テスト用の実行ファイル">
テスト用実行ファイルfor Mac</a><br />
<br />

２．アプリが実行可能か確認する<br />
圧縮ファイルを解凍するとexeファイルがあるのでそれを実行してください。<br />
<img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['resources'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/website/editScenario/001.jpg"><br />
<br /><br />

３．何かボタンを押すとスクリプトが実行されます<br />
一度スクリプトを実行させると終了するまで他のスクリプトを実行できません。
早く終了させる場合はマウスのスクロールとかで早送りしてください。
Re：スクリプトのリロード
1〜5:intro_XX.csvのスクリプト

４．起動したら試しに５のボタンを押してみてください。以下の様な画面が出ると成功です<br />
<img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['resources'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/website/editScenario/003.jpg"><br />
<br /><br />

５．シナリオを実際に変更する<br />
story_game_Data/StreamingAssets/app/story_game/skit/Scenario
の中にある各intro_XX.csvを変更した後にReボタンで再読み込みすると確認できます。<br />
（Mac版はstory_game.appを右クリック>パッケージの内容を表示 Contents>Data>以下同じ）<br />
<br />
<img src="<?php echo ((is_array($_tmp=$this->_tpl_vars['resources'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
/website/editScenario/004.jpg"><br />
<br />
スクリプトに関しては宴ページにいろいろとマニュアルが有りますのでそちらを利用してみてください。<br />
分からない場合はご連絡くださいませー！<br />
※ページの管理者様の方の確認が取れましたらリンク追加しようと思います<br />

<p></p>

<p><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['link']['back'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">戻る</a></p>

</div>
<div class="section normal" id="noteSection">
</div>


<!-- メインカラム終了 -->





















































