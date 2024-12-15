<?php

namespace Alexplusde\School;

use rex_article;
use rex_user;
use rex_yform_manager_collection;
use rex_yform_manager_dataset;

class TeamTag extends \rex_yform_manager_dataset
{
    public const STATUS_ONLINE = 1;
    public const STATUS_OFFLINE = 0;
    
    /* Name / Liste */
    /** @api */
    public function getName() : mixed
    {
        return $this->getValue("name");
    }
    /** @api */
    public function setName(mixed $value) : self
    {
        $this->setValue("name", $value);
        return $this;
    }

    /* Beschreibung */
    /** @api */
    public function getDescription(bool $asPlaintext = false) : string
    {
        if ($asPlaintext) {
            return strip_tags($this->getValue("description"));
        }
        return $this->getValue("description");
    }
    /** @api */
    public function setDescription(mixed $value) : self
    {
        $this->setValue("description", $value);
        return $this;
    }
            
    /* Link zur Seite */
    /** @api */
    public function getArticle(bool $asArticle = false) : ?rex_article
    {
        return rex_article::get($this->getValue("article_id"));
    }
    public function getArticleId() : ?int
    {
        return $this->getValue("article_id");
    }
    public function getArticleIdUrl() : ?string
    {
        if ($article = $this->getArticle()) {
            return $article->getUrl();
        }
    }
    /** @api */
    public function setArticleId(string $id) : self
    {
        if (rex_article::get($id)) {
            $this->getValue("article_id", $id);
        }
        return $this;
    }

    /* Leitung */
    /** @api */
    public function getTeamFav() : ?Team
    {
        return $this->getRelatedDataset("team_id_fav");
    }

    /* Verknüpft mit folgenden Ansprechpartnern */
    /** @api */
    public function getTeam() : ?rex_yform_manager_collection
    {
        return $this->getRelatedCollection("team_id");
    }

    /* online? */
    /** @api */
    public function getStatus() : mixed
    {
        return $this->getValue("status");
    }
    /** @api */
    public function setStatus(mixed $param) : mixed
    {
        $this->setValue("status", $param);
        return $this;
    }

    public static function getStatusOptions() : array
    {
        return [
            self::STATUS_ONLINE => "translate:school.table.status.online",
            self::STATUS_OFFLINE => "translate:school.table.status.offline",
        ];
    }

    /*  */
    /** @api */
    public function getCreateDate() : ?string
    {
        return $this->getValue("createdate");
    }
    /** @api */
    public function setCreateDate(string $value) : self
    {
        $this->setValue("createdate", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getCreateUser() : ?rex_user
    {
        return rex_user::get($this->getValue("createuser"));
    }
    /** @api */
    public function setCreateUser(mixed $value) : self
    {
        $this->setValue("createuser", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getUpdateDate() : ?string
    {
        return $this->getValue("updatedate");
    }
    /** @api */
    public function setUpdateDate(string $value) : self
    {
        $this->setValue("updatedate", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getUpdateUser() : ?rex_user
    {
        return rex_user::get($this->getValue("updateuser"));
    }
    /** @api */
    public function setUpdateUser(mixed $value) : self
    {
        $this->setValue("updateuser", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getUuid() : mixed
    {
        return $this->getValue("uuid");
    }
    /** @api */
    public function setUuid(mixed $value) : self
    {
        $this->setValue("uuid", $value);
        return $this;
    }

}
