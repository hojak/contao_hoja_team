<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');


/**
 * PTSV Teams
 *
 * @author Holger Janßen <contao@holgerjanssen.de>
 * @copyright Holger Janßen <http://www.holgerjanssen.de>
 * @package controller
 * @filesource
 * @licence LGPL
 */

 
/**
 * Extend default palette
 */
$GLOBALS['TL_DCA']['tl_user']['palettes']['extend'] = str_replace('fop;', 'fop;{hoja_teams_legend},hoja_teams,hoja_teamp;', $GLOBALS['TL_DCA']['tl_user']['palettes']['extend']);
$GLOBALS['TL_DCA']['tl_user']['palettes']['custom'] = str_replace('fop;', 'fop;{hoja_teams_legend},hoja_teams,hoja_teamp;', $GLOBALS['TL_DCA']['tl_user']['palettes']['custom']);

/**
 * Add fields to tl_user
 */
$GLOBALS['TL_DCA']['tl_user']['fields']['hoja_teams'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_user']['ptsv_teams'],
	'exclude'			=> true,
	'inputType'			=> 'checkbox',
	'foreignKey'		=> 'tl_hoja_team.name',
	'eval'				=> array('multiple'=>true),
	'options_callback'	=> array('HoJaTeamBEHelper','getTeamOptionArray'),
	'sql'				=> 'blob NULL',
);


$GLOBALS['TL_DCA']['tl_user']['fields']['hoja_teamp'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_user']['hoja_teamp'],
	'exclude'		=> true,
	'inputType'		=> 'checkbox',
	'options'		=> &$GLOBALS['TL_LANG']['tl_user']['hoja_teamp_labels'],
	'eval'			=> array('multiple'=>true),
	'sql'			=> 'blob NULL',
);

