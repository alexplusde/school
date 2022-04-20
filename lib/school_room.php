<?php


class school_room extends \rex_yform_manager_dataset
{
    public function getname()
    {
        return $this->getValue('name');
    }
    public function gettitle()
    {
        return $this->getValue('title');
    }
    public function getUrl()
    {
        if (rex_addon::get("yrewrite") && rex_addon::get("yrewrite")->isAvailable()) {
            $host = rex_yrewrite::getFullUrlByArticleId(rex_article::getCurrentId(), rex_clang::getCurrentId());
        } else {
            $host = rtrim(rex::getServer(), '/').rex_getUrl(rex_article::getCurrentId(), rex_clang::getCurrentId());
        }
        
        return  rex_getUrl('', '', ['room-id' => $this->getId()]);
    }
}
