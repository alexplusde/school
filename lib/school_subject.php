<?php


class school_subject extends \rex_yform_manager_dataset
{
    public function getstatus()
    {
        return $this->getValue('status');
    }
    public function getname()
    {
        return $this->getValue('name');
    }
    public function getart_id()
    {
        return $this->getValue('art_id');
    }
    public function getUrl()
    {
        if (rex_addon::get("yrewrite") && rex_addon::get("yrewrite")->isAvailable()) {
            $host = rex_yrewrite::getFullUrlByArticleId(rex_article::getCurrentId(), rex_clang::getCurrentId());
        } else {
            $host = rtrim(rex::getServer(), '/').rex_getUrl(rex_article::getCurrentId(), rex_clang::getCurrentId());
        }
        
        return  rex_getUrl('', '', ['subject-id' => $this->getId()]);
    }
}
