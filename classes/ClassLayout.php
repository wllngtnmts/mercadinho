<?php
namespace Classes;

class ClassLayout
{
    public static function setHeadRestrict($permissoesPagina=['admin','developer'])
    {
        $sessio = new ClassSessions();
        $sessio->verifyInsideSession($permissoesPagina);
    }


    #Setar as tags do head
    public static function setHead($title, $description, $author,$arrOpt=[])
    {
        $html = "<!DOCTYPE html>\n";
        $html .= "<html lang='pt-br'>\n";
        $html .= "<head>\n";
        $html .= "    <meta charset='UTF-8'>\n";
        $html .= "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>\n";
        $html .= "    <meta name='author' content='$author'>\n";
        $html .= "    <meta name='format-detection' content='telephone=no'>\n";
        $html .= "    <meta name='description' content='$description'>\n";
        $html .= "    <meta http-equiv='X-UA-Compatible' content='ie=edge'>\n";
        $html .= "    <title>$title</title>\n";
        #FAVICON
        $html .= "    <link rel='stylesheet' href='" . DIRPAGE . "lib/css/style.css?v=56'>\n";
        $html.=(array_key_exists('headerAdmin',$arrOpt))?"<link rel='stylesheet' href='" . DIRPAGE . "lib/css/style_admin.css?v=351'>\n":"";
        $html .= "</head>\n";
        $html .= "<body>\n";
        echo $html;
        if(array_key_exists('headerAdmin',$arrOpt)){require_once (DIRREQ."helpers/header-admin.php");}
    }

    #Set title pages
    public static function setTitle($title,$format=null)
    {
        echo " <div class='title' style='$format'><em>$title</em></div> ";
    }


    #Setar as tags do footer
    public static function setFooter()
    {
        $html="<script src='".DIRPAGE."lib/js/zepto.min.js'></script>\n";
        $html.="<script src='".DIRPAGE."lib/js/vanilla-masker.min.js'></script>\n";
        $html.="<script src='https://www.google.com/recaptcha/api.js?render=".SITEKEY."'></script>\n";
        $html.="<script src='".DIRPAGE."lib/js/javascript.min.js?v=61'></script>\n";
        $html.="<script src='".DIRPAGE."lib/js/popup-list.js?v=31'></script>\n";
        $html.="</body>\n";
        $html.="</html>";
        echo$html;
    }
}