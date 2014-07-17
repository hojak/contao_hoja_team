<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Hoja_team
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'HoJaTeamBEHelper'           => 'system/modules/hoja_team/HoJaTeamBEHelper.php',
	'ContentHoJaTeamDescription' => 'system/modules/hoja_team/ContentHoJaTeamDescription.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_hoja_team_description' => 'system/modules/hoja_team/templates',
));
