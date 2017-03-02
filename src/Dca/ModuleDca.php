<?php

namespace Comolo\LanguageControllerBundle\Dca;

use Contao\Database;

class ModuleDca
{
    const LANG_FALLBACK = 'fallback';

    protected $database;

    public function __construct()
    {
        $this->database = Database::getInstance();
    }

    public function getLanguageOptions()
    {
        $languages = [];
        $languages[self::LANG_FALLBACK] = self::LANG_FALLBACK;

        $result = $this->database->execute('SELECT DISTINCT language FROM tl_page WHERE type=\'root\'');

        foreach ($result->fetchAllAssoc() as $value) {
            $languages[$value['language']] = $value['language'];
        }

        return $languages;
    }

    public function getModuleOptions()
    {
        $modules = [];

        $result = $this->database->execute('SELECT id, name FROM tl_module WHERE type!=\'langcontroller\'');

        foreach ($result->fetchAllAssoc() as $value) {
            $modules[$value['id']] = $value['name'];
        }

        return $modules;
    }
}