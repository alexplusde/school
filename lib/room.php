<?php

namespace Alexplusde\School;

use rex_addon;
use rex_article;    
use rex_clang;
use rex_yrewrite;
use rex;
use rex_user;

class Room extends \rex_yform_manager_dataset
{
    public const STATUS_ONLINE = 1;
    public const STATUS_OFFLINE = 0;

        
    /* Raum-Kürzel */
    /** @api */
    public function getName() : mixed {
        return $this->getValue("name");
    }
    /** @api */
    public function setName(mixed $value) : self {
        $this->setValue("name", $value);
        return $this;
    }

    /* Gebäudeteil */
    /** @api */
    public function getLocated() : string {
        return $this->getValue("located");
    }
    /** @api */
    public function setLocated(mixed $value) : self {
        $this->setValue("located", $value);
        return $this;
    }

    /* Name / Funktion */
    /** @api */
    public function getTitle() : mixed {
        return $this->getValue("title");
    }
    /** @api */
    public function setTitle(mixed $value) : self {
        $this->setValue("title", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getCreateDate() : ?string {
        return $this->getValue("createdate");
    }
    /** @api */
    public function setCreateDate(string $value) : self {
        $this->setValue("createdate", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getCreateUser() : ?rex_user {
        return rex_user::get($this->getValue("createuser"));
    }
    /** @api */
    public function setCreateUser(mixed $value) : self {
        $this->setValue("createuser", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getUpdateDate() : ?string {
        return $this->getValue("updatedate");
    }
    /** @api */
    public function setUpdateDate(string $value) : self {
        $this->setValue("updatedate", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getUpdateUser() : ?rex_user {
        return rex_user::get($this->getValue("updateuser"));
    }
    /** @api */
    public function setUpdateUser(mixed $value) : self {
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
        
        return $host .  rex_getUrl('', '', ['room-id' => $this->getId()]);
    }
}
