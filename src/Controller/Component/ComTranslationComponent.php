<?php
/**
 * Created by PhpStorm.
 * User: TruongNv
 * Date: 2019-06-10
 * Time: 1:39 PM
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

class ComTranslationComponent extends Component
{

    public function convertToHtml($content)
    {
        $content = str_replace(htmlentities('<br>'), "</span><br><span>", $content);
        $content = str_replace(htmlentities('<span>'), "<span>", $content);
        $content = str_replace(htmlentities('</span>'), "</span>", $content);
        $content = str_replace(htmlentities('<span class="bg-warning text-selected clicked">'), '<span class="bg-warning text-selected">' , $content);
        $content = str_replace(htmlentities('<text class="display-text">'), '<text class="display-text">' , $content);
        $content = str_replace(htmlentities('</text>'), '</text>' , $content);
        return $content;
    }
    public function convertToString($content)
    {
        $content = str_replace("&lt;br/&gt;", "&lt;br/&gt;", $content);
        $content = str_replace("&lt;span&gt;", "&lt;span&gt;", $content);
        $content = str_replace("&lt;/span&gt;", "&lt;/span&gt;", $content);
        return $content;
    }

    public function replaceBreakElement($content)
    {
        str_replace("\n", "<br/>", $content);
        return $content;
    }

    public function breakAllString($content)
    {
        $expStr = explode(" ", $content);
        $strAddElm = '';
        foreach ($expStr as $value) {
            $strAddElm .= "<span>" . $value . "</span> ";
        }
        return $strAddElm;
    }
}