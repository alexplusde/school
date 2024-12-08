<?php


class school_team extends \rex_yform_manager_dataset
{
    public function getTitle()
    {
        return $this->getValue('title');
    }
    public function getFullName()
    {
        if (strlen($this->getPrename() > 0)) {
            return $this->getacademic_title() . " ". substr($this->getPrename(), 0, 1) .". ". $this->getName();
        }
        return $this->getacademic_title() . " ". $this->getName();
    }
    public function getAnrede()
    {
        if ($this->getValue('gender') == "m") {
            return "Herr";
        } elseif ($this->getValue('gender') == "w") {
            return "Frau";
        }
        return "";
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
    public function getKuerzel()
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
    public function getEmail()
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
