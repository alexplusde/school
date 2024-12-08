<?php

namespace Alexplusde\School;

use rex_addon;
use rex_article;    
use rex_clang;
use rex_yrewrite;
use rex;
use rex_user;
use rex_yform_manager_dataset;

class Course extends \rex_yform_manager_dataset
{
    public const STATUS_ONLINE = 1;
    public const STATUS_OFFLINE = 0;

    /* Klasse */
    /** @api */
    public function getName() : mixed {
        return $this->getValue("name");
    }
    /** @api */
    public function setName(mixed $value) : self {
        $this->setValue("name", $value);
        return $this;
    }

    /* Raum */
    /** @api */
    public function getRoom() : ?rex_yform_manager_dataset {
        return $this->getRelatedDataset("room_id");
    }

    /* Lehrer */
    /** @api */
    public function getTeacher() : ?rex_yform_manager_dataset {
        return $this->getRelatedDataset("teacher_id");
    }

    /* stlv. Lehrer */
    /** @api */
    public function getTeacherAlt() : ?rex_yform_manager_dataset {
        return $this->getRelatedDataset("teacher_alt_id");
    }

    /* Sichtbarkeit */
    /** @api */
    public function getStatus() : mixed {
        return $this->getValue("status");
    }

    public static function getStatusOptions() : array {
        return [
            self::STATUS_ONLINE => "translate:school.table.status.online",
            self::STATUS_OFFLINE => "translate:school.table.status.offline",
        ];
    }

    /** @api */
    public function setStatus(mixed $param) : mixed {
        $this->setValue("status", $param);
        return $this;
    }

    /*  */
    /** @api */
    public function getCreateDate() : ?string {
        return $this->getValue("createDate");
    }
    /** @api */
    public function setCreateDate(string $value) : self {
        $this->setValue("createDate", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getCreateUser() : ?rex_user {
        return rex_user::get($this->getValue("createUser"));
    }
    /** @api */
    public function setCreateUser(mixed $value) : self {
        $this->setValue("createUser", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getUpdateDate() : ?string {
        return $this->getValue("updateDate");
    }
    /** @api */
    public function setUpdateDate(string $value) : self {
        $this->setValue("updateDate", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getUpdateUser() : ?rex_user {
        return rex_user::get($this->getValue("updateUser"));
    }
    /** @api */
    public function setUpdateUser(mixed $value) : self {
        $this->setValue("updateUser", $value);
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
    
    public function getUrl() :string
    {
        if (rex_addon::get("yrewrite") && rex_addon::get("yrewrite")->isAvailable()) {
            $host = rex_yrewrite::getFullUrlByArticleId(rex_article::getCurrentId(), rex_clang::getCurrentId());
        } else {
            $host = rtrim(rex::getServer(), '/').rex_getUrl(rex_article::getCurrentId(), rex_clang::getCurrentId());
        }
        
        return  $host . rex_getUrl('', '', ['course-id' => $this->getId()]);
    }

}?>
