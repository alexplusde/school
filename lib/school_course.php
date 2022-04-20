<?php


class school_course extends \rex_yform_manager_dataset
{
    public function getname()
    {
        return $this->getValue('name');
    }
    public function getroom_id()
    {
        return $this->getValue('room_id');
    }
    public function getteacher_id()
    {
        return $this->getValue('teacher_id');
    }
    public function getteacher_alt_id()
    {
        return $this->getValue('teacher_alt_id');
    }
    public function getstatus()
    {
        return $this->getValue('status');
    }
    public function getUrl()
    {
        if (rex_addon::get("yrewrite") && rex_addon::get("yrewrite")->isAvailable()) {
            $host = rex_yrewrite::getFullUrlByArticleId(rex_article::getCurrentId(), rex_clang::getCurrentId());
        } else {
            $host = rtrim(rex::getServer(), '/').rex_getUrl(rex_article::getCurrentId(), rex_clang::getCurrentId());
        }
        
        return  rex_getUrl('', '', ['course-id' => $this->getId()]);
    }
}
