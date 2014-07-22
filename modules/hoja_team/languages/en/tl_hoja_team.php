<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * HoJa Teams
 *
 * @author Holger Janßen <contao@holgerjanssen.de>
 * @copyright Holger Janßen <http://www.holgerjanssen.de>
 * @package ptsv_teams
 * @filesource
 * @licence LGPL
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_hoja_team'] = array (
	"name" 			=> array ('team name','a unique name for the team'),
	'league' 		=> array ('league', 'league of the team in the current season'),
	'team_image' 	=> array ('team picture', 'Choose a picture of this team. The size of the picture will be adjusted automatically.'),
	'trainer' 		=> array ("trainer", "not of the trainer"),
	'trainer_email' => array ("email", "email address of the trainer"),
	'contact' 		=> array ("contact", "name of an official contact"),
	'contact_email' => array ("email", "official contact email address"),
	'description'	=> array ('description', "free text description"),
	'filePath'		=> array ("image directory", "select an image directory for this team" ),
	'useFilePath'	=> array ("select image directory", "click to limit the directory for this team"),
	'training'	=> array ("schedule", "weekly training times of this team"),
	'show_training' => array ("show training schedule", "Is the schedule to be displayed in the team page?"),
	'training_dayofweek' => array ("day of week", "day of week" ),
	'training_dayofweek_labels' => array 
	(
		"1" => "Monday",
		"2" => "Tuesday",
		"3" => "Wednesday",
		"4" => "Thursday",
		"5" => "Friday",
		"6" => "Saturday",
		"7" => "Sunday"
	),
	'training_time_start' => array ("start", "time" ),
	'training_time_end'   => array ("end", "time" ),
	'training_location'	=> array ("location", "name of gym / address" ),
);


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_hoja_team']['general_legend'] = 'team data';
$GLOBALS['TL_LANG']['tl_hoja_team']['filePath_legend'] = 'limit file path for pictures etc.';
$GLOBALS['TL_LANG']['tl_hoja_team']['contact_legend'] = "contact data";
$GLOBALS['TL_LANG']['tl_hoja_team']['training_legend'] = "training schedule";
$GLOBALS['TL_LANG']['tl_hoja_team']['info_legend'] = "data for the public team page";


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_hoja_team']['new']			= array('create team', 'creat a new team');
$GLOBALS['TL_LANG']['tl_hoja_team']['show']			= array('show', 'show details of team ID %s');
$GLOBALS['TL_LANG']['tl_hoja_team']['edit_team']	= array('edit details', 'edit details of team ID %s');
$GLOBALS['TL_LANG']['tl_hoja_team']['copy']			= array('copy team', 'copy the team with ID %s');
$GLOBALS['TL_LANG']['tl_hoja_team']['delete']		= array('delete team', ' delete team ID %s');

?>
