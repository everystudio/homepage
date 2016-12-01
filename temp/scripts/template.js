/* template.js ver 1.0 */

var imagePath;

// お問い合わせページのフォームチェック
function Definition(PageID , Env ){
    over_text = "_over";

    path = new Array(1);
    path[0] = 1;
    path[1] = 1;
    path[2] = 1;

    imagePath = Env > 0 ? "/" : "/temp/";

    if (PageID == path[0] ||
        PageID == path[1] ||
        PageID == path[2]){
        path = "../temp/"; 
        if( 0 < Env ){
            path = "../";
        }
    }
    else{
        path = "../../temp/";
        if( 0 < Env ){
            path = "../../";
        }
    }
}


// お問い合わせページのフォームチェック
function Header(PageID,Env){

Definition(PageID,Env);
    
                    document.write("<div class = 'display_none'><h1>パズルキングダム</h1></div><div id = 'contents_area_main_image'>");
                    document.write("<div id = 'column_1_main_image'>");

// PC用、TP用メインイメージ
                    document.write("<div class = 'visible-lg visible-md visible-sm'><img src = '" + imagePath + "images/main_image.png' width = '100%' usemap='#main_image_map' border='0' title = 'パズルキングダム' alt = 'パズルキングダム' id = 'main_image' class = 'col-xs-12 col-sm-12 col-md-12 col-lg-12' onmouseup = this.src = '" + imagePath + "images/main_image.jpg' />");
// クリッカブルMAPとaタグによるリンクは、同時に指定するとIE11でリンクが無効になる
                    document.write("<map id='main_image_map' name='main_image_map'>");
                    document.write("<area shape='rect' coords='431,294,565,333' href='http://store.apple.com/jp' title = 'App Store' alt = 'App Store' target = '_blank' class = 'no_outline' />");
                    document.write("<area shape='rect' coords='0,0,996,350' href='" + path + "index.html' title = 'パズルキングダム' alt = 'パズルキングダム' class = 'no_outline' />");
                    document.write("</map>");
                    document.write("</div>");

// SP用メインイメージ
                    document.write("<div class = 'visible-xs'><a href = '" + path + "index.html'><img src = '" + imagePath + "images/sp/main_image.jpg' width = '100%' border='0' title = 'パズルキングダム' alt = 'パズルキングダム' id = 'main_image_sp' class = 'col-xs-12 col-sm-12 col-md-12 col-lg-12' onmouseup = this.src = '"+imagePath+"images/sp/main_image.jpg'></a></div>");

                    document.write("</div>");
                    document.write("</div>");

// 検証用
                     // document.write("ドキュメント幅");
                     // document.write($(document).width());
                     // document.write("<br />ドキュメント高さ");
                     // document.write($(document).height());
}


// ページ先頭に戻る
function page_top(){

                    document.write("<div class = 'page_top_link'><font class = 'font_02'><a href='#top' class = 'link_02'>ページ先頭に戻る</a></font></div>");

}

// 公式サイトTOP PC版
function official_top(){

                    document.write("<div align = 'right' class = 'margin_01 visible-lg visible-md visible-sm'><font class = 'font_02'><a href = '/' class = 'link_02'>公式サイトTOP</a></font></div>");

}

// 公式サイトTOP スマートフォン版
function official_top_sp(){

                    document.write("<div class = 'column_1_back_home visible-xs'><div class = 'sp_contents_04'><a href='/'><font>公式サイトTOP</font></a></div></div>");

}
        
// お問い合わせページのフォームチェック
function Footer(PageID){

Definition(PageID,0);

                    document.write("<div id='footer' class = 'visible-lg visible-md visible-sm'>");
                    document.write("<table border = '0' cellpadding = '0' cellspacing = '0' id = 'footer_link' align = 'center'>");
                    document.write("<tr><td><div class = 'footer_link_text'><font width='532' class = 'font_02'><a href='" + path + "index.html' class = 'link_01'>HOME</a></font></div></td><td class = 'footer_link_space'><div class = 'footer_link_text'><font width='532' class = 'font_02'>｜</font></div></td>");
                    document.write("<td><div class = 'footer_link_text'><font class = 'font_02'><a href='http://www.taison-inc.com/about/' target = '_blank' class = 'link_01'>会社概要</a></font></div></td><td class = 'footer_link_space'><div class = 'footer_link_text'><font width='532' class = 'font_02'>｜</font></div></td>");
                    document.write("<!--<td><div class = 'footer_link_text'><font class = 'font_02'><a href='" + path + "settlement.html' class = 'link_01' target = '_blank'>資金決済法に基づく表示</a></font></div></td><td class = 'footer_link_space'><div class = 'footer_link_text'><font width='532' class = 'font_02'>｜</font></div></td>//-->");
                    document.write("<td><div class = 'footer_link_text'><font class = 'font_02'><a href='" + path + "user_policy.html' class = 'link_01' target = '_blank'>使用許諾約款</a></font></div></td><td class = 'footer_link_space'><div class = 'footer_link_text'><font width='532' class = 'font_02'>｜</font></div></td>");
                    document.write("<!--<td><div class = 'footer_link_text'><font class = 'font_02'><a href='" + path + "asct.html' class = 'link_01' target = '_blank'>特定商取引法に基づく表示</a></font></div></td><td class = 'footer_link_space'><div class = 'footer_link_text'><font width='532' class = 'font_02'>｜</font></div></td>//-->");
                    document.write("<td><div class = 'footer_link_text'><font class = 'font_02'><a href='" + path + "mypage.php' class = 'link_01'>マイページ</a></font></div></td><td class = 'footer_link_space'><div class = 'footer_link_text'><font width='532' class = 'font_02'>｜</font></div></td>");
                    document.write("<td><div class = 'footer_link_text'><font class = 'font_02'><a href='" + path + "contact.php' class = 'link_01'>お問い合わせ</a></font></div></td><td class = 'footer_link_space'><div class = 'footer_link_text'><font width='532' class = 'font_02'>｜</font></div></td>");
                    document.write("<td><div class = 'footer_link_text'><font class = 'font_02'><a href='" + path + "privacy_policy.html' class = 'link_01' target = '_blank'>プライバシーポリシー</a></font></div></td></tr>");
                    document.write("<tr><td colspan = '20' align = 'center'><div id='copy_right'><font class = 'font_03'>Copyright (C) 2014 TAISON.INC.</font></div></td></tr>");
                    document.write("</table>");
                    document.write("</div>");

                    document.write("<div id='footer' class = 'visible-xs'>");
                    document.write("<table border = '0' cellpadding = '0' cellspacing = '0' id = 'footer_link' align = 'center'>");
                    document.write("<tr><td colspan = '20' align = 'center'><div id='copy_right'><font class = 'font_03'>Copyright (C) 2014 TAISON.INC.</font></div></td></tr>");
                    document.write("</table>");
                    document.write("</div>");

}

// お問い合わせページのフォームチェック
function Footer_maintenance(PageID){

Definition(PageID,0);

                    document.write("<div id='footer_maintenance' class = 'visible-lg visible-md visible-sm'>");
                    document.write("<table border = '0' cellpadding = '0' cellspacing = '0' id = 'footer_link_maintenance' align = 'center'>");
                    document.write("<tr><td colspan = '20' align = 'center'><div id='copy_right'><font class = 'font_03'>Copyright (C) 2014 TAISON.INC.</font></div></td></tr>");
                    document.write("</table>");
                    document.write("</div>");

                    document.write("<div id='footer' class = 'visible-xs'>");
                    document.write("<table border = '0' cellpadding = '0' cellspacing = '0' id = 'footer_link' align = 'center'>");
                    document.write("<tr><td colspan = '20' align = 'center'><div id='copy_right'><font class = 'font_03'>Copyright (C) 2014 TAISON.INC.</font></div></td></tr>");
                    document.write("</table>");
                    document.write("</div>");

}

/* ------------------------------------------------------------------------------------------------ */
