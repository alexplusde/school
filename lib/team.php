<?php

namespace Alexplusde\School;

use rex;
use rex_addon;
use rex_article;
use rex_clang;
use rex_yrewrite;
use rex_user;
use rex_media;
use rex_yform_manager_dataset;

class Team extends \rex_yform_manager_dataset
{
    public const STATUS_ONLINE = 1;
    public const STATUS_OFFLINE = 0;

    public function getFullName()
    {
        if (strlen($this->getFirstname() > 0)) {
            return $this->getAcademicTitle() . " ". substr($this->getFirstname(), 0, 1) .". ". $this->getName();
        }
        return $this->getAcademicTitle() . " ". $this->getName();
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

    
    /* Amtsbezeichnung */
    /** @api */
    public function getTitle() : string
    {
        return $this->getValue("title");
    }
    /** @api */
    public function setTitle(mixed $value) : self
    {
        $this->setValue("title", $value);
        return $this;
    }

    /* Anrede */
    /** @api */
    public function getGender() : string
    {
        return $this->getValue("gender");
    }
    /** @api */
    public function setGender(mixed $value) : self
    {
        $this->setValue("gender", $value);
        return $this;
    }

    /* Veröffentlichung */
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
            self::STATUS_ONLINE => "translate:school.table.team.status.online",
            self::STATUS_OFFLINE => "translate:school.table.team.status.offline",
        ];
    }

    /* Titel */
    /** @api */
    public function getAcademicTitle() : mixed
    {
        return $this->getValue("academic_title");
    }
    /** @api */
    public function setAcademicTitle(mixed $value) : self
    {
        $this->setValue("academic_title", $value);
        return $this;
    }

    /* Vorname */
    /** @api */
    public function getFirstname() : mixed
    {
        return $this->getValue("prename");
    }
    /** @api */
    public function setFirstname(mixed $value) : self
    {
        $this->setValue("prename", $value);
        return $this;
    }

    /* Nachname */
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

    /* Kürzel */
    /** @api */
    public function getKuerzel() : mixed
    {
        return $this->getValue("kuerzel");
    }
    /** @api */
    public function setKuerzel(mixed $value) : self
    {
        $this->setValue("kuerzel", $value);
        return $this;
    }

    /* Aufgaben / Funktion */
    /** @api */
    public function getJob() : mixed
    {
        return $this->getValue("job");
    }
    /** @api */
    public function setJob(mixed $value) : self
    {
        $this->setValue("job", $value);
        return $this;
    }

    /* Sonderverantwortlichkeiten */
    /** @api */
    public function getSonder() : string
    {
        return $this->getValue("sonder");
    }
    /** @api */
    public function setSonder(mixed $value) : self
    {
        $this->setValue("sonder", $value);
        return $this;
    }

    /* In Lehrerliste anzeigen? */
    /** @api */
    public function getIsTeacher(bool $asBool = false) : mixed
    {
        if ($asBool) {
            return (bool) $this->getValue("is_teacher");
        }
        return $this->getValue("is_teacher");
    }
    /** @api */
    public function setIsTeacher(int $value = 1) : self
    {
        $this->setValue("is_teacher", $value);
        return $this;
    }
            
    /* E-Mail-Adresse */
    /** @api */
    public function getEmail() : mixed
    {
        return $this->getValue("email");
    }
    /** @api */
    public function setEmail(mixed $value) : self
    {
        $this->setValue("email", $value);
        return $this;
    }

    /* Fächer */
    /** @api */
    public function getCourse() : ?rex_yform_manager_dataset
    {
        return $this->getRelatedDataset("course_ids");
    }

    /* Profilbild */
    /** @api */
    public function getImage(bool $asMedia = false) : mixed
    {
        // Wenn leer, allgemeines Bild nehmen:
        if (empty($this->getValue("Bild"))) {
            if($asMedia) {
                return \rex_media_plus::get(\rex_config::get('school', 'default_image'));
            }
            return \rex_config::get('school', 'team_default_image');
        }
        if ($asMedia) {
            return \rex_media_plus::get($this->getValue("Bild"));
        }
        return $this->getValue("Bild");
    }
    /** @api */
    public function setImage(string $filename) : self
    {
        if (rex_media::get($filename)) {
            $this->getValue("Bild", $filename);
        }
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
            
    /*  */
    /** @api */
    public function getCreateUser() : ?rex_user
    {
        return rex_user::get($this->getValue("createUser"));
    }
    /** @api */
    public function setCreateUser(mixed $value) : self
    {
        $this->setValue("createUser", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getCreateDate() : ?string
    {
        return $this->getValue("createDate");
    }
    /** @api */
    public function setCreateDate(string $value) : self
    {
        $this->setValue("createDate", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getUpdateDate() : ?string
    {
        return $this->getValue("updateDate");
    }
    /** @api */
    public function setUpdateDate(string $value) : self
    {
        $this->setValue("updateDate", $value);
        return $this;
    }

    /*  */
    /** @api */
    public function getUpdateUser() : ?rex_user
    {
        return rex_user::get($this->getValue("updateUser"));
    }
    /** @api */
    public function setUpdateUser(mixed $value) : self
    {
        $this->setValue("updateUser", $value);
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

    /* [translate:school.table.preview_link] */
    /** @api */
    public function getUrl() : string
    {
        if (rex_addon::get("yrewrite") && rex_addon::get("yrewrite")->isAvailable()) {
            $StartArticleId = rex_yrewrite::getCurrentDomain()->getStartId();
            $host = rex_yrewrite::getFullUrlByArticleId($StartArticleId, rex_clang::getCurrentId());
        } else {
            $host = rtrim(rex::getServer(), '/').rex_getUrl(rex_article::getCurrentId(), rex_clang::getCurrentId());
        }

        return  $host . rex_getUrl('', '', ['team-id' => $this->getId()]);
    }

}
