/* library.js ver 1.0 */


// 画像の事前読み込み
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}


// ロールオーバー画像表示
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
  if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];x.style.cursor="hand";}
}


function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}


function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
  d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}


// FAQのコンテンツオープンクローズ機能
function sub_contents(sub_contents_name_get) {
  sub_contents_name = sub_contents_name_get;
  visibility_flg = document.getElementById(sub_contents_name).style.display;
    if (visibility_flg == 'none'){
      document.getElementById(sub_contents_name).style.display = 'block';
    }else if(visibility_flg == ''){
      document.getElementById(sub_contents_name).style.display = 'block';
    }else{
// オープンクローズ機能を利用する場合は、ここを「none」にする
// オープンクローズ機能を利用しない場合は、ここを「block」にする
// 「css/style.css」の方も編集が必要です
      document.getElementById(sub_contents_name).style.display = 'none';
    }
  }


// ご意見・ご要望フォーム（PC）のフォームチェック
function form_01_check_contact(){

  if(document.getElementsByName('form_1')[0].value == ""){
    alert('IDを入力してください。');
    return false;
  }else if(document.getElementsByName('form_1')[0].value.match( /[^0-9a-zA-Z]/ )){
    alert('IDは半角英数字で入力してください。');
    return false;
  }else if(document.getElementsByName('form_2')[0].value == ""){
    alert('ユーザー名を入力してください。');
    return false;
  }else if(document.getElementsByName('mail_address_from')[0].value == ""){
    alert('メールアドレスを入力してください。');
    return false;
  }else if(!document.getElementsByName('mail_address_from')[0].value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
    alert('メールアドレスを正しく入力してください。');
    return false;
  }else if(document.getElementsByName('mail_address_from')[0].value != document.getElementsByName('mail_address_from_con')[0].value){
    alert('メールアドレスと確認用メールアドレスが違います。');
    return false;
  }else if(document.getElementsByName('form_3')[0].value == ""){
    alert('詳細内容を入力してください。');
    return false;
  }else{
    return true;
  }

}

 // ご意見・ご要望フォーム（SP）のフォームチェック
function form_01_check_contact_sp(){

  if(document.getElementsByName('form_1_sp')[0].value == ""){
    alert('IDを入力してください。');
    return false;
  }else if(document.getElementsByName('form_1_sp')[0].value.match( /[^0-9a-zA-Z]/ )){
    alert('IDは半角英数字で入力してください。');
    return false;
  }else if(document.getElementsByName('form_2_sp')[0].value == ""){
    alert('ユーザー名を入力してください。');
    return false;
  }else if(document.getElementsByName('mail_address_from_sp')[0].value == ""){
    alert('メールアドレスを入力してください。');
    return false;
  }else if(!document.getElementsByName('mail_address_from_sp')[0].value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
    alert('メールアドレスを正しく入力してください。');
    return false;
  }else if(document.getElementsByName('mail_address_from_sp')[0].value != document.getElementsByName('mail_address_from_con_sp')[0].value){
    alert('メールアドレスと確認用メールアドレスが違います。');
    return false;
  }else if(document.getElementsByName('form_3_sp')[0].value == ""){
    alert('詳細内容を入力してください。');
    return false;
  }else{
    return true;
  }

}


// ゲーム進行に関する不具合（PC）のフォームチェック
function form_02_check_contact(){

  if(document.getElementsByName('form_1')[0].value == ""){
    alert('IDを入力してください。');
    return false;
  }else if(document.getElementsByName('form_1')[0].value.match( /[^0-9a-zA-Z]/ )){
    alert('IDは半角英数字で入力してください。');
    return false;
  }else if(document.getElementsByName('form_2')[0].value == ""){
    alert('ユーザー名を入力してください。');
    return false;
  }else if(document.getElementsByName('mail_address_from')[0].value == ""){
    alert('メールアドレスを入力してください。');
    return false;
  }else if(!document.getElementsByName('mail_address_from')[0].value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
    alert('メールアドレスを正しく入力してください。');
    return false;
  }else if(document.getElementsByName('mail_address_from')[0].value != document.getElementsByName('mail_address_from_con')[0].value){
    alert('メールアドレスと確認用メールアドレスが違います。');
    return false;
  }else if(document.getElementsByName('form_3')[0].value == ""){
    alert('OSのバージョンを入力してください。');
    return false;
  }else if(document.getElementsByName('form_4')[0].value == ""){
    alert('利用通信会社を選択してください。');
    return false;
  }else if(document.getElementsByName('form_5')[0].value == ""){
    alert('利用機種を入力してください。');
    return false;
  }else if(document.getElementsByName('form_7')[0].value == ""){
    alert('秘密のコードを入力してください。');
    return false;
  }else if(document.getElementsByName('form_7')[0].value.match( /[^0-9a-zA-Z]/ )){
    alert('秘密のコードは半角英数字で入力してください。');
    return false;
  }else if(document.getElementsByName('form_7')[0].value.length != 9){
    alert('秘密のコードは9文字で入力してください。');
    return false;
  }else if(document.getElementsByName('form_8')[0].value == ""){
    alert('詳細内容を入力してください。');
    return false;
  }else{
    return true;
  }

}

// ゲーム進行に関する不具合（SP）のフォームチェック
function form_02_check_contact_sp(){

  if(document.getElementsByName('form_1_sp')[0].value == ""){
    alert('IDを入力してください。');
    return false;
  }else if(document.getElementsByName('form_1_sp')[0].value.match( /[^0-9a-zA-Z]/ )){
    alert('IDは半角英数字で入力してください。');
    return false;
  }else if(document.getElementsByName('form_2_sp')[0].value == ""){
    alert('ユーザー名を入力してください。');
    return false;
  }else if(document.getElementsByName('mail_address_from_sp')[0].value == ""){
    alert('メールアドレスを入力してください。');
    return false;
  }else if(!document.getElementsByName('mail_address_from_sp')[0].value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
    alert('メールアドレスを正しく入力してください。');
    return false;
  }else if(document.getElementsByName('mail_address_from_sp')[0].value != document.getElementsByName('mail_address_from_con_sp')[0].value){
    alert('メールアドレスと確認用メールアドレスが違います。');
    return false;
  }else if(document.getElementsByName('form_3_sp')[0].value == ""){
    alert('OSのバージョンを入力してください。');
    return false;
  }else if(document.getElementsByName('form_4_sp')[0].value == ""){
    alert('利用通信会社を入力してください。');
    return false;
  }else if(document.getElementsByName('form_5_sp')[0].value == ""){
    alert('利用機種を入力してください。');
    return false;
  }else if(document.getElementsByName('form_7_sp')[0].value == ""){
    alert('秘密のコードを入力してください。');
    return false;
  }else if(document.getElementsByName('form_7_sp')[0].value.match( /[^0-9a-zA-Z]/ )){
    alert('秘密のコードは半角英数字で入力してください。');
    return false;
  }else if(document.getElementsByName('form_7_sp')[0].value.length != 9 ){
    alert('秘密のコードは9文字で入力してください。');
    return false;
  }else if(document.getElementsByName('form_8_sp')[0].value == ""){
    alert('詳細内容を入力してください。');
    return false;
  }else{
    return true;
  }

}


// 魔宝石購入に関する不具合（PC）のフォームチェック
function form_03_check_contact(){

  if(document.getElementsByName('form_1')[0].value == ""){
    alert('IDを入力してください。');
    return false;
  }else if(document.getElementsByName('form_1')[0].value.match( /[^0-9a-zA-Z]/ )){
    alert('IDは半角英数字で入力してください。');
    return false;
  }else if(document.getElementsByName('form_2')[0].value == ""){
    alert('ユーザー名を入力してください。');
    return false;
  }else if(document.getElementsByName('mail_address_from')[0].value == ""){
    alert('メールアドレスを入力してください。');
    return false;
  }else if(!document.getElementsByName('mail_address_from')[0].value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
    alert('メールアドレスを正しく入力してください。');
    return false;
  }else if(document.getElementsByName('mail_address_from')[0].value != document.getElementsByName('mail_address_from_con')[0].value){
    alert('メールアドレスと確認用メールアドレスが違います。');
    return false;
  }else if(document.getElementsByName('form_3')[0].value == ""){
    alert('OSのバージョンを入力してください。');
    return false;
  }else if(document.getElementsByName('form_4')[0].value == ""){
    alert('利用通信会社を選択してください。');
    return false;
  }else if(document.getElementsByName('form_5')[0].value == ""){
    alert('利用機種を入力してください。');
    return false;
  }else if(document.getElementsByName('form_6')[0].value == ""){
    alert('秘密のコードを入力してください。');
    return false;
  }else if(document.getElementsByName('form_6')[0].value.match( /[^0-9a-zA-Z]/ )){
    alert('秘密のコードは半角英数字で入力してください。');
    return false;
  }else if(document.getElementsByName('form_6')[0].value.length != 9){
    alert('秘密のコードは9文字で入力してください。');
    return false;
  }else if(document.getElementsByName('form_7')[0].value == ""){
    alert('購入日時を入力してください。');
    return false;
  }else if(document.getElementsByName('form_8')[0].value == ""){
    alert('購入履歴の有無を選択してください。');
    return false;
  }else if(document.getElementsByName('form_9')[0].value == ""){
    alert('詳細内容を入力してください。');
    return false;
  }else{
    return true;
  }

}

// 魔宝石購入に関する不具合（SP）のフォームチェック
function form_03_check_contact_sp(){

  if(document.getElementsByName('form_1_sp')[0].value == ""){
    alert('IDを入力してください。');
    return false;
  }else if(document.getElementsByName('form_1_sp')[0].value.match( /[^0-9a-zA-Z]/ )){
    alert('IDは半角英数字で入力してください。');
    return false;
  }else if(document.getElementsByName('form_2_sp')[0].value == ""){
    alert('ユーザー名を入力してください。');
    return false;
  }else if(document.getElementsByName('mail_address_from_sp')[0].value == ""){
    alert('メールアドレスを入力してください。');
    return false;
  }else if(!document.getElementsByName('mail_address_from_sp')[0].value.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
    alert('メールアドレスを正しく入力してください。');
    return false;
  }else if(document.getElementsByName('mail_address_from_sp')[0].value != document.getElementsByName('mail_address_from_con_sp')[0].value){
    alert('メールアドレスと確認用メールアドレスが違います。');
    return false;
  }else if(document.getElementsByName('form_3_sp')[0].value == ""){
    alert('OSのバージョンを入力してください。');
    return false;
  }else if(document.getElementsByName('form_4_sp')[0].value == ""){
    alert('利用通信会社を入力してください。');
    return false;
  }else if(document.getElementsByName('form_5_sp')[0].value == ""){
    alert('利用機種を入力してください。');
    return false;
  }else if(document.getElementsByName('form_6_sp')[0].value == ""){
    alert('秘密のコードを入力してください。');
    return false;
  }else if(document.getElementsByName('form_6_sp')[0].value.match( /[^0-9a-zA-Z]/ )){
    alert('秘密のコードは半角英数字で入力してください。');
    return false;
    }else if(document.getElementsByName('form_6_sp')[0].value.length != 9 ){
    alert('秘密のコードは9文字で入力してください。');
    return false;
  }else if(document.getElementsByName('form_7_sp')[0].value == ""){
    alert('購入日時を入力してください。');
    return false;
  }else if(document.getElementsByName('form_8_sp')[0].value == ""){
    alert('購入履歴の有無を選択してください。');
    return false;
  }else if(document.getElementsByName('form_9_sp')[0].value == ""){
    alert('詳細内容を入力してください。');
    return false;
  }else{
    return true;
  }

}


// 添付ファイルのサイズチェック（PC）
function form_file_check_contact(){

// デバッグ用
// alert('チェック機能（PC）は正常です。');

upFiles = document.confirm_form.user_file.files;

// 添付ファイルが有るか無いかを判定
  if(upFiles.length == 0){
// デバッグ用
// alert('添付ファイル無し（PC）で送信します。');
    return true;
  }else{
// デバッグ用
// alert('添付ファイル有り（PC）で送信します。');
    for(var i=0; i<upFiles.length; i++){

      if(upFiles[i].size > 2048000){
        alert('ファイルサイズが2MBを超えています');
        return false;
      }else{
// デバッグ用
// alert('ファイルサイズは2MB以下です');
        if(document.confirm_form.user_file.value.slice(-3) != "jpg" && document.confirm_form.user_file.value.slice(-3) != "png" && document.confirm_form.user_file.value.slice(-3) != "bmp" && document.confirm_form.user_file.value.slice(-3) != "JPG" && document.confirm_form.user_file.value.slice(-3) != "PNG" && document.confirm_form.user_file.value.slice(-3) != "BMP"){
          alert('ファイル形式は、「JPG」,「PNG」,「BMP」のみ対応しております。');
// デバッグ用
// デバッグ用alert('現在選択されているファイルの拡張子（PC）は、' + document.confirm_form.user_file.value.slice(-3) + 'です。');
          return false;
        }else{
// デバッグ用
// alert('現在選択されているファイルの拡張子（PC）は、' + document.confirm_form.user_file.value.slice(-3) + 'です。');
          return true;
        }

      }

    }

  }

}

// 添付ファイルのサイズチェック（SP）
function form_file_check_contact_sp(){

upFiles = document.confirm_form_sp.user_file_sp.files;

// 添付ファイルが有るか無いかを判定
  if(upFiles.length == 0){
// デバッグ用
// alert('添付ファイル無し（SP）で送信します。');
      return true;
  }else{
// デバッグ用
// alert('添付ファイル有り（SP）で送信します。');
// alert('チェック機能（SP）は正常です。' + upFiles.length);
    for(var i=0; i<upFiles.length; i++){
// デバッグ用
// alert('チェック機能（SP）は正常です。');
// alert('ファイルサイズは' + upFiles[i].size + 'バイトです。');
      if(upFiles[i].size > 2048000){
        alert('ファイルサイズが2MBを超えています');
      return false;
      }else{
// デバッグ用
// alert('ファイルサイズは2MB以下です');
        if(document.confirm_form_sp.user_file_sp.value.slice(-3) != "jpg" && document.confirm_form_sp.user_file_sp.value.slice(-3) != "png" && document.confirm_form_sp.user_file_sp.value.slice(-3) != "bmp" && document.confirm_form_sp.user_file_sp.value.slice(-3) != "JPG" && document.confirm_form_sp.user_file_sp.value.slice(-3) != "PNG" && document.confirm_form_sp.user_file_sp.value.slice(-3) != "BMP"){
          alert('ファイル形式は、「JPG」,「PNG」,「BMP」のみ対応しております。');
// デバッグ用
// alert('現在選択されているファイルの拡張子（SP）は、' + document.confirm_form.user_file_sp.value.slice(-3) + 'です。');
          return false;
        }else{
// デバッグ用
// alert('現在選択されているファイルの拡張子（SP）は、' + document.confirm_form_sp.user_file_sp.value.slice(-3) + 'です。');
          return true;
        }

      }

    }

  }

}

// 「同意する」ボタンのチェックボックスにチェックを入れたらボタンが押せる
function checkbox_status(button_id,checkbox_01,checkbox_02) {

// デバッグ用
// alert(button_id);

checkbox_01 = eval(checkbox_01);
checkbox_02 = eval(checkbox_02);

        if (checkbox_01.checked && checkbox_02.checked) {
        document.getElementById('' + button_id + '').disabled = false;
        } else {
        document.getElementById('' + button_id + '').disabled = true; 
        }

}

// フリック関連（テスト中）
function touchHandler(e){

  e.preventDefault();

  var touch = e.touches[0];

  if(e.type == "touchstart"){

    $("#txt").text("そのまま横にフリック");

    }

  if(e.type == "touchmove"){

    $("#txt").text("あ");

    }

  if(e.type == "touchend"){

    $("#txt").text("フリック終了");

    }

}