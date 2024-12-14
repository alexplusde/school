<?php

namespace Alexplusde\School;

use rex_addon;
use rex_article;
use rex_clang;
use rex_yrewrite;
use rex;
use rex_user;
use rex_media;
use rex_yform_manager_collection;
use rex_yform_manager_dataset;

class Project extends \rex_yform_manager_dataset
{
    public const STATUS_ONLINE = 1;
    public const STATUS_OFFLINE = 0;

    public function getUrl($type = "")
    {
        if (rex_addon::get("yrewrite") && rex_addon::get("yrewrite")->isAvailable()) {
            $host = rex_yrewrite::getFullUrlByArticleId(rex_article::getCurrentId(), rex_clang::getCurrentId());
        } else {
            $host = rtrim(rex::getServer(), '/').rex_getUrl(rex_article::getCurrentId(), rex_clang::getCurrentId());
        }
        
        if ($type == "ag") {
            return  rex_getUrl('', '', ['ag-id' => $this->getId()]);
        } elseif ($type == "smv") {
            return  rex_getUrl('', '', ['smv-id' => $this->getId()]);
        }
    }

    /* Name */
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

    /* Raum */
    /** @api */
    public function getRoom() : ?Room
    {
        return $this->getRelatedDataset("room_id");
    }

    /* Lehrer */
    /** @api */
    public function getTeacher() : ?rex_yform_manager_collection
    {
        return $this->getRelatedCollection("teacher_ids");
    }

    /* Treffzeiten */
    /** @api */
    public function getTextDate() : mixed
    {
        return $this->getValue("text_date");
    }
    /** @api */
    public function setTextDate(mixed $value) : self
    {
        $this->setValue("text_date", $value);
        return $this;
    }

    /* Wochentag */
    /** @api */
    public function getWeekdays() : string
    {
        return $this->getValue("weekdays");
    }
    /** @api */
    public function setWeekdays(mixed $value) : self
    {
        $this->setValue("weekdays", $value);
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
            
    /* Typ */
    /** @api */
    public function getType() : string
    {
        return $this->getValue("type");
    }
    /** @api */
    public function setType(mixed $value) : self
    {
        $this->setValue("type", $value);
        return $this;
    }

    /* Bild */
    /** @api */
    public function getImage(bool $asMedia = false) : mixed
    {
        if ($asMedia) {
            return rex_media::get($this->getValue("image"));
        }
        return $this->getValue("image");
    }
    /** @api */
    public function setImage(string $filename) : self
    {
        if (rex_media::get($filename)) {
            $this->getValue("image", $filename);
        }
        return $this;
    }
            
    /* Bildergalerie */
    /** @api */
    public function getImages(bool $asMedia = false) : mixed
    {
        if ($asMedia) {
            return rex_media::get($this->getValue("images"));
        }
        return $this->getValue("images");
    }
    /** @api */
    public function setImages(string $filename) : self
    {
        if (rex_media::get($filename)) {
            $this->getValue("images", $filename);
        }
        return $this;
    }
            
    /* Status */
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
