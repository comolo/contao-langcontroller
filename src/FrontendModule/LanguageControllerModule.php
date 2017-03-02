<?php

namespace Comolo\LanguageControllerBundle\FrontendModule;

use Comolo\LanguageControllerBundle\Dca\ModuleDca;
use \Module;
use \BackendTemplate;

class LanguageControllerModule extends Module
{
    /**
     * {@inheritdoc}
     */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            /** @var \BackendTemplate|object $objTemplate */
            $objTemplate = new BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['langcontroller'][0]) . ' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;

            return $objTemplate->parse();
        }

        $moduleId = $this->getModuleByLanguage(unserialize($this->languageModuleMapping), $this->getCurrentLanguage());

        return $moduleId ? $this->getFrontendModule($moduleId) : '';
    }

    /**
     * @param $moduleConfig
     * @param $language
     * @return int|bool
     */
    protected function getModuleByLanguage($moduleConfig, $language)
    {
        $fallback = false;

        foreach ($moduleConfig as $langConfig) {
            if ($langConfig['language'] == $language) {
                return $langConfig['module'];
            }
            else if ($langConfig['language'] == ModuleDca::LANG_FALLBACK) {
                $fallback = $langConfig['module'];
            }
        }

        return $fallback;
    }

    /**
     * Get the current frontend language
     * @return string
     */
    protected function getCurrentLanguage()
    {
        global $objPage;

        return $objPage->language;
    }

    /**
     * {@inheritdoc}
     */
    protected function compile()
    {

    }
}