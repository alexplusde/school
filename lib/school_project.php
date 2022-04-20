<?php


class school_project extends \rex_yform_manager_dataset
{
    public function getstatus()
    {
        return $this->getValue('status');
    }
    public function getname()
    {
        return $this->getValue('name');
    }
    public function getroom_id()
    {
        return $this->getValue('room_id');
    }
    public function getteacher_ids()
    {
        return $this->getValue('teacher_ids');
    }
    public function gettext_date()
    {
        return $this->getValue('text_date');
    }
    public function getweekdays()
    {
        return $this->getValue('weekdays');
    }
    public function getdescription()
    {
        return $this->getValue('description');
    }
    public function gettype()
    {
        return $this->getValue('type');
    }
    public function getimage()
    {
        return $this->getValue('image');
    }
    public function getimages()
    {
        return $this->getValue('images');
    }
    public function getUrl()
    {
        if (rex_addon::get("yrewrite") && rex_addon::get("yrewrite")->isAvailable()) {
            $host = rex_yrewrite::getFullUrlByArticleId(rex_article::getCurrentId(), rex_clang::getCurrentId());
        } else {
            $host = rtrim(rex::getServer(), '/').rex_getUrl(rex_article::getCurrentId(), rex_clang::getCurrentId());
        }
        
        if ($this->gettype() == "ag") {
            return  rex_getUrl('', '', ['project_ag-id' => $this->getId()]);
        } elseif ($this->gettype == "smv") {
            return  rex_getUrl('', '', ['project_smv-id' => $this->getId()]);
        }
    }
}
