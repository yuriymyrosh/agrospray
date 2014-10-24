<?php 

$GLOBALS['TL_DCA']['tl_module']['palettes']['categoryList']     = '{title_legend},name,type;jumpTo';
$GLOBALS['TL_DCA']['tl_module']['palettes']['productsList']     = '{title_legend},name,type;perPage,jumpTo';

$GLOBALS['TL_DCA']['tl_module']['fields']['perPage'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['perPage'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['jumpTo'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['jumpTo'],
	'exclude'                 => true,
	'inputType'               => 'pageTree',
	'sql'                     => "varchar(255) NOT NULL default ''"
);

?>