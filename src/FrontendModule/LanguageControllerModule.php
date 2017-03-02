<?php

namespace Comolo\LanguageControllerBundle\FrontendModule;

use \Module;
use \BackendTemplate;

class LanguageControllerModule extends Module
{
    /**
     * @var string
     */
    protected $strTemplate = '';

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

        return '';
    }

    /**
     * {@inheritdoc}
     */
    protected function compile()
    {
        die('hier');

        #$mapping = unserialize($this->languageModuleMapping);

        #var_dump($mapping); exit;

        #return $this->getFrontendModule($id);
    }
}