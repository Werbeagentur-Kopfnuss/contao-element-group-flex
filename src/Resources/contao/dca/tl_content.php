<?php
// src/Resources/contao/dca/tl_content.php

use Contao\DataContainer\PaletteManipulator;

// Add new content element
$GLOBALS['TL_DCA']['tl_content']['palettes']['element_group_flex'] = '{type_legend},type,headline;{config_legend},nestedFragments;{template_legend:hide},customTpl;{expert_legend:hide},cssID,space';

// Define the new field
$GLOBALS['TL_DCA']['tl_content']['fields']['flex'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['flex'],
    'inputType' => 'select',
    'options' => ['2 Elemente nebeneinander', '3 Elemente nebeneinander', '4 Elemente nebeneinander', '6 Elemente nebeneinander'],
    'eval' => ['mandatory' => true, 'includeBlankOption' => true, 'chosen' => true, 'tl_class'=>'w50'],
    'sql' => "varchar(255) NOT NULL default ''"
];

// Add new field
PaletteManipulator::create()
    // add a new "custom_legend" before the "type_legend"
	->addLegend('custom_flex_legend', 'type_legend', PaletteManipulator::POSITION_AFTER)

    // directly add new fields to "custom_legend"
    ->addField('flex', 'custom_flex_legend', PaletteManipulator::POSITION_APPEND)

    // then apply it to the palette "table" in "tl_content" as usual
    ->applyToPalette('element_group_flex', 'tl_content');