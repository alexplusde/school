<?php


class school_team_tags extends \rex_yform_manager_dataset
{
    public function getname()
    {
        return $this->getValue('name');
    }
    public function getdescription()
    {
        return $this->getValue('description');
    }
    public function getprio()
    {
        return $this->getValue('prio');
    }
    public function getarticle_id()
    {
        return $this->getValue('article_id');
    }
    public function getstatus()
    {
        return $this->getValue('status');
    }
    public function getteam_id_fav()
    {
        return $this->getValue('team_id_fav');
    }
    public function getteam_id()
    {
        return $this->getValue('team_id');
    }
}
