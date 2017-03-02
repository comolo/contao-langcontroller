<?php

namespace Comolo\LanguageControllerBundle\Dca;

use Contao\Database;

class ModuleDca
{
    protected $database;

    public function __construct()
    {
        $this->database = Database::getInstance();
    }

    public function getLanguageOptions()
    {
        $languages = [];
        $languages['fallback'] = 'fallback';

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