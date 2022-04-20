<?php


class school_team extends \rex_yform_manager_dataset
{
    public function gettitle()
    {
        return $this->getValue('title');
    }
    public function getgender()
    {
        return $this->getValue('gender');
    }
    public function getstatus()
    {
        return $this->getValue('status');
    }
    public function getacademic_title()
    {
        return $this->getValue('academic_title');
    }
    public function getprename()
    {
        return $this->getValue('prename');
    }
    public function getname()
    {
        return $this->getValue('name');
    }
    public function getkuerzel()
    {
        return $this->getValue('kuerzel');
    }
    public function getjob()
    {
        return $this->getValue('job');
    }
    public function getsonder()
    {
        return $this->getValue('sonder');
    }
    public function getis_teacher()
    {
        return $this->getValue('is_teacher');
    }
    public function getemail()
    {
        return $this->getValue('email');
    }
    public function getBild()
    {
        return $this->getValue('Bild');
    }
    public function getcourse_ids()
    {
        return $this->getValue('course_ids');
    }
    public function getdescription()
    {
        return $this->getValue('description');
    }
    public function getteam_tag_ids()
    {
        return $this->getValue('team_tag_ids');
    }
    public function getUrl()
    {
        if (rex_addon::get("yrewrite") && rex_addon::get("yrewrite")->isAvailable()) {
            $host = rex_yrewrite::getFullUrlByArticleId(rex_article::getCurrentId(), rex_clang::getCurrentId());
        } else {
            $host = rtrim(rex::getServer(), '/').rex_getUrl(rex_article::getCurrentId(), rex_clang::getCurrentId());
        }

        return  rex_getUrl('', '', ['team-id' => $this->getId()]);
    }
}
