<?php

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'langController';
$GLOBALS['TL_DCA']['tl_module']['palettes']['langController'] = '{title_legend},name,type;{config_legend},languageModuleMapping;{protected_legend:hide},protected;{expert_legend:hide},guests';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['languageModuleMapping'] = array
(
    // todo: validate (not two languages)
    'label'                   => &$GLOBALS['TL_LANG']['tl_module']['languageModuleMapping'],
    'exclude'                 => true,
    'inputType'               => 'multiColumnWizard',
    'eval'                    => array(
        'columnFields' => [
            'languageCode' => [
                'label'     => &$GLOBALS['TL_LANG']['tl_module']['languageModuleMapping']['languageCode'],
                'exclude'   => true,
                'inputType' => 'select',
                'options'   => ['option1' => 'Option 1'],
                'mandatory' => true,
                'eval'      => ['mandatory' => true, 'style' => 'max-width:150px'],
            ],
            'module' => [
                'label'     => &$GLOBALS['TL_LANG']['tl_module']['languageModuleMapping']['module'],

                'exclude'   => true,
                'inputType' => 'select',
                'options'   => ['option1' => 'Option 1'],
                'mandatory' => true,
                'eval'      => ['mandatory' => true, 'style' => 'max-width:150px'],
            ],
        ],
        'tl_class'     => 'clr',
    ),
    'sql'                     => "text NULL"
);
