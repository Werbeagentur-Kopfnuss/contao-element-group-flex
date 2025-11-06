<?php

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;

// Add new content element
$GLOBALS['TL_DCA']['tl_content']['palettes']['element_group_flex'] = '{type_legend},type,headline;{config_legend},nestedFragments;{template_legend:hide},customTpl;{expert_legend:hide},cssID,space';

// Define the new field
$GLOBALS['TL_DCA']['tl_content']['fields']['flex_align'] = [
    'inputType' => 'select',
    'options' => [
        'flex-align-start',
        'flex-align-center',
        'flex-align-end',
    ],
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['flexOptionsAlign'],
    'eval' => ['mandatory' => true, 'includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => ['type' => 'string', 'length' => 16, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['flex_justify'] = [
    'inputType' => 'select',
    'options' => [
        'flex-justify-start',
        'flex-justify-center',
        'flex-justify-end',
        'flex-justify-space-between',
    ],
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['flexOptionsJustify'],
    'eval' => ['mandatory' => true, 'includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => ['type' => 'string', 'length' => 16, 'default' => ''],
];

// Add new field
PaletteManipulator::create()
    // add a new "custom_legend" before the "type_legend"
    ->addLegend('custom_flex_legend', 'type_legend', PaletteManipulator::POSITION_AFTER)

    // directly add new fields to "custom_legend"
    ->addField('flex_align', 'custom_flex_legend', PaletteManipulator::POSITION_APPEND)

    // directly add new fields to "custom_legend"
    ->addField('flex_justify', 'custom_flex_legend', PaletteManipulator::POSITION_APPEND)

    // then apply it to the palette "table" in "tl_content" as usual
    ->applyToPalette('element_group_flex', 'tl_content')
;
