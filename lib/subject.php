<?php

namespace Alexplusde\School;

use rex_addon;
use rex_article;    
use rex_clang;
use rex_yrewrite;
use rex;
use rex_user;

class Subject extends \rex_yform_manager_dataset
{
    public const STATUS_ONLINE = 1;
    public const STATUS_OFFLINE = 0;

    /* Fach */
    /** @api */
    public function getName() : string {
        return $this->getValue("name");
    }
    /** @api */
    public function setName(string $value) : self {
        $this->setValue("name", $value);
        return $this;
    }

    /* Link zur Seite */
    /** @api */
    public function getArt(bool $asArticle = false) : ?rex_article {
        return rex_article::get($this->getValue("art_id"));
    }
    public function getArtId() : ?int {
        return $this->getValue("art_id");
    }
    public function getArtIdUrl() : ?string {
        if($article = $this->getArt()) {
            return $article->getUrl();
        }
    }

    /** @api */
    public function setArtId(string $id) : self {
        if(rex_article::get($id)) {
            $this->getValue("art_id", $id);
        }
        return $this;
    }

    /* Sichtbarkeit */
    /** @api */
    public function getStatus() : mixed {
        return $this->getValue("status");
    }
    /** @api */
    public function setStatus(mixed $param) : mixed {
        $this->setValue("status", $param);
        return $this;
    }

    public static function getStatusOptions() : array {
        return [
            self::STATUS_ONLINE => "translate:school.table.status.online",
            self::STATUS_OFFLINE => "translate:school.table.status.offline",
        ];
    }

    /*  */
    /** @api */
    public function getCreatedate() : ?string {
        return $this->getValue("createdate");
    }
    /** @api */
    public function setCreatedate(string $value) : self {
        $this->setValue("createdate", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getCreateuser() : ?rex_user {
        return rex_user::get($this->getValue("createuser"));
    }
    /** @api */
    public function setCreateuser(mixed $value) : self {
        $this->setValue("createuser", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getUpdatedate() : ?string {
        return $this->getValue("updatedate");
    }
    /** @api */
    public function setUpdatedate(string $value) : self {
        $this->setValue("updatedate", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getUpdateuser() : ?rex_user {
        return rex_user::get($this->getValue("updateuser"));
    }
    /** @api */
    public function setUpdateuser(mixed $value) : self {
        $this->setValue("updateuser", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getUuid() : mixed {
        return $this->getValue("uuid");
    }
    /** @api */
    public function setUuid(mixed $value) : self {
        $this->setValue("uuid", $value);
        return $this;
    }

    public function getUrl()
    {
        if (rex_addon::get("yrewrite") && rex_addon::get("yrewrite")->isAvailable()) {
            $host = rex_yrewrite::getFullUrlByArticleId(rex_article::getCurrentId(), rex_clang::getCurrentId());
        } else {
            $host = rtrim(rex::getServer(), '/').rex_getUrl(rex_article::getCurrentId(), rex_clang::getCurrentId());
        }
        
        return  $host . rex_getUrl('', '', ['subject-id' => $this->getId()]);
    }
}
