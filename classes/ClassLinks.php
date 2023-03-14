<?php
namespace Classes;

class ClassLinks{

    #Get link
    public static function getLink($title,$page,$img)
    {
        $link=(strpos($page,'http')===false)?DIRPAGE.$page:$page;
        return "<li><a href='$link'><img src='".DIRPAGE."img/link-icons/$img' alt='$title' title='$title'>$title</a></li>";
    }

}