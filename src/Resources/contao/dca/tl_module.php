<?php

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'langcontroller';
$GLOBALS['TL_DCA']['tl_module']['palettes']['langcontroller'] = '{title_legend},name,type;{config_legend},languageModuleMapping;{protected_legend:hide},protected;{expert_legend:hide},guests';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['languageModuleMapping'] = array
(
    // todo: validate (->not two languages)
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['languageModuleMapping'],
    'exclude'                 => true,
    'inputType'               => 'multiColumnWizard',
    'eval'                    => array(
        'columnFields' => [
            'language' => [
                'label'     => &$GLOBALS['TL_LANG']['tl_module']['languageModuleMapping']['languageCode'],
                'exclude'   => true,
                'inputType' => 'select',
                'options_callback' => [\Comolo\LanguageControllerBundle\Dca\ModuleDca::class, 'getLanguageOptions'],
                'mandatory' => true,
                'eval'      => ['mandatory' => true, 'style' => 'max-width:230px'],
            ],
            'module' => [
                'label'     => &$GLOBALS['TL_LANG']['tl_module']['languageModuleMapping']['module'],
                'exclude'   => true,
                'inputType' => 'select',
                'options_callback' => [\Comolo\LanguageControllerBundle\Dca\ModuleDca::class, 'getModuleOptions'],
                'mandatory' => true,
                'eval'      => ['mandatory' => true, 'style' => 'max-width:300px'],
            ],
        ],
        'tl_class'     => 'clr',
    ),
    'sql' => "text NULL"
);
