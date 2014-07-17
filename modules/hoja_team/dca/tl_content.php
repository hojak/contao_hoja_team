<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

$GLOBALS['TL_DCA']['tl_content']['palettes']['hoja_team_description']                       
	= '{type_legend},type,headline;{hoja_team_description_legend},hoja_team_id,{hoja_team_size_legend},size;{expert_legend:hide},cssID,cssClass';

	
$GLOBALS['TL_DCA']['tl_content']['fields']['hoja_team_id'] = array
(
	'label'				=> &$GLOBALS['TL_LANG']['tl_content']['hoja_team_id'],
	'exclude'			=> true,
	'inputType'			=> 'select',
	'foreignKey'		=> 'tl_hoja_team.name',
	'options_callback'	=> array('HoJaTeamBEHelper','getTeamOptionArray'),
	'sql'				=> "int(10) unsigned NULL",
);


//$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('PTSVTeamBEHelper', 'setFiletreePath');
//$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('tl_ptsv_team', 'checkPermission');
