<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * HoJa Team
 *
 * @author Holger Janßen <contao@holgerjanssen.de>
 * @copyright Holger Janßen <http://www.holgerjanssen.de>
 * @package hoja_teams
 * @filesource
 * @licence LGPL
 */

$GLOBALS['TL_DCA']['tl_hoja_team'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		/*'ctable'                      => array('tl_hoja_team_player', 'tl_hoja_team_match'),
		'switchToEdit'                => true,
		'enableVersioning'            => true, */
		'onload_callback' => array
		(
			array('tl_hoja_team', 'checkPermission')
		),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'			=> 1,
			'fields'		=> array('name'),
			'flag'			=> 1,
			'panelLayout'	=> 'filter;search,limit'
		),
		'label' => array
		(
			'fields'	=> array('name','league'),
			'format'	=> '%s (%s)'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'			=> &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'			=> 'act=select',
				'class'			=> 'header_edit_all',
				'attributes'	=> 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations'        => array
		(
			'edit_team'   => array
			(
				'label' => &$GLOBALS['TL_LANG']['tl_hoja_team']['edit_team'],
				'href'  => 'act=edit',
				'icon'  => 'edit.gif'
			),
			'delete' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['tl_hoja_team']['delete'],
				'href'       => 'act=delete',
				'icon'       => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
		),		
		
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'	=> array('useFilePath'),
		'default'		=> 
			'{general_legend},name,league,training_dates;'
			.'{contact_legend},trainer,trainer_email,contact,contact_email;'
			.'{filePath_legend},useFilePath;'
			.'{info_legend},team_image,description;'
			.'{training_legend},training;'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'useFilePath'	=> 'filePath'
	),

	// Fields
	'fields' => array
	(
		'id' => array (
			'sql' => 'int(10) unsigned NOT NULL auto_increment',	
		),
		'tstamp' => array
		(
			'sql' => "int(10) unsigned NOT NULL default '0'"
		),
		'name' => array
		(
			'label'		=> &$GLOBALS['TL_LANG']['tl_hoja_team']['name'],
			'exclude'	=> true,
			'search'	=> true,
			'inputType'	=> 'text',
			'eval'		=> array('mandatory'=>true, 'maxlength'=>255, 'unique' => true),
			'sql'		=> 'varchar(255) NOT NULL default \'\''
		),
		'league' => array
		(
			'label'		=> &$GLOBALS['TL_LANG']['tl_hoja_team']['league'],
			'exclude'	=> true,
			'search'	=> true,
			'inputType'	=> 'text',
			'eval'		=> array('mandatory'=>true, 'maxlength'=>50),
			'sql'		=> 'varchar(255) NOT NULL default \'\''
		),
		'team_image' => array
		(
			'label'		=> &$GLOBALS['TL_LANG']['tl_hoja_team']['team_image'],
			'exclude'	=> true,
			'inputType'	=> 'fileTree',
			'eval'		=> array('filesOnly'=>true, 'fieldType'=>'radio', 'tl_class'=>'clr'),
			'sql'		=> "binary(16) NULL",
		),
		'trainer' => array
		(
			'label'		=> &$GLOBALS['TL_LANG']['tl_hoja_team']['trainer'],
			'exclude'	=> true,
			'search'	=> true,
			'inputType'	=> 'text',
			'eval'		=> array('maxlength'=>255, 'tl_class' => 'w50'),
			'sql'		=> 'text NOT NULL'
		),
		'trainer_email' => array (
			'label' 	=> &$GLOBALS['TL_LANG']['tl_hoja_team']['trainer_email'],
			'exclude'	=> true,
			'search'	=> true,
			'inputType'	=> 'text',
			'eval'	=> array('maxlength'=>255, 'rgxp' => 'email', 'decodeEntities' => true, 'tl_class' => 'w50'),
			'sql'		=> 'text NOT NULL'
		),
		'contact' => array 
		(
			'label'		=> &$GLOBALS['TL_LANG']['tl_hoja_team']['contact'],
			'exclude'	=> true,
			'search'	=> true,
			'inputType'	=> 'text',
			'eval'		=> array('maxlength'=>255, 'tl_class' => 'w50'),
			'sql' 		=> 'text NOT NULL'
		),
		'contact_email' => array (
			'label'		=> &$GLOBALS['TL_LANG']['tl_hoja_team']['contact_email'],
			'exclude'	=> true,
			'search'	=> true,
			'inputType'	=> 'text',
			'eval'		=> array('maxlength'=>255, 'rgxp' => 'email', 'decodeEntities' => true, 'tl_class' => 'w50'),
			'sql'		=> 'text NOT NULL'
		),
		'description' => array (
			'label'		=> &$GLOBALS['TL_LANG']['tl_hoja_team']['description'],
			'exclude'	=> true,
			'search'	=> true,
			'inputType'	=> 'textarea',
			'eval'		=> array ('rte' => 'tinyMCE'),
			'sql' 		=> 'text NOT NULL'
		),
		'useFilePath' => array
		(
			'label'		=> &$GLOBALS['TL_LANG']['tl_hoja_team']['useFilePath'],
			'exclude'	=> true,
			'filter'	=> true,
			'inputType'	=> 'checkbox',
			'eval'		=> array('submitOnChange'=>true),
			'sql'		=> 'char(1) NOT NULL default \'\''
		),
		'filePath' => array
		(
			'label'		=> &$GLOBALS['TL_LANG']['tl_hoja_team']['filePath'],
			'exclude'	=> true,
			'inputType'	=> 'fileTree',
			'eval'		=> array('fieldType'=>'radio', 'files'=>false),
			'sql' 		=>  'binary(16) NULL',
		),                       
		'training' => array
		(
			'label'		=> &$GLOBALS['TL_LANG']['tl_hoja_team']['training'],
			'inputType'	=> 'multiColumnWizard',
			'sql'		=> 'text NULL',
			'eval'		=> array
			(
				'columnFields' => array 
				(	
					'dayofweek' => array
					(
						'label'		=> &$GLOBALS['TL_LANG']['tl_hoja_team']['training_dayofweek'],
						'exclude'	=> 'true',
						'inputType'	=> 'select',
						'options'	=> &$GLOBALS['TL_LANG']['tl_hoja_team']['training_dayofweek_labels'],
						'eval'		=> array('columnPos' => '1','mandatory'=>true,'style'=>"width: 100px")
					),
					'time_start' => array
					(
						'label'	 	=> &$GLOBALS['TL_LANG']['tl_hoja_team']['training_time_start'],
						'exclude'	=> 'true',
						'inputType'	=> 'text',
						'eval'		=> array('columnPos' => '2', 'mandatory'=>true,'style'=>"width: 50px")
					),
					'time_end' => array
					(
						'label'		=> &$GLOBALS['TL_LANG']['tl_hoja_team']['training_time_end'],
						'exclude'	=> 'true',
						'inputType'	=> 'text',
						'eval'		=> array('columnPos' => '3','mandatory' => true, 'style'=>"width: 50px")
					),
					'location' => array
					(
						'label'		=> &$GLOBALS['TL_LANG']['tl_hoja_team']['training_location'],
						'exclude'	=> 'true',
						'inputType'	=> 'text',
						'eval'		=> array('columnPos' => '4', 'style'=>"width: 180px")
					),
				),
			),
		),
	),
);



/**
 * hoja Teams
 *
 * @author Holger Janßen <contao@holgerjanssen.de>
 * @copyright Holger Janßen <http://www.holgerjanssen.de>
 * @package controller
 * @filesource
 * @licence LGPL
 */
class tl_hoja_team extends Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}


	public function hasRight ( $right ) {
		if ( $this->User->hasAccess ( $rigth, 'hoja_teamp') )
			return true;

		$grpRights = $this->Database->prepare("SELECT hoja_teamp FROM tl_user_group WHERE id in (" . join ( $this->User->groups, ",") .")" )
																				->execute();

		while ( $grpRights->next () ) {
			$perms = deserialize ( $grpRights->hoja_teamp );
			error_log ( "ceck for " . $right . " in " . print_r ( $perms,1 ) );
			if ( $perms && in_array ( $right, $perms )) return true;
		}

		error_log ( "not all!" );
		return false;
	}


	/**
	 * Check permissions to edit table tl_news4ward
	 */
	public function checkPermission()
	{
		if ($this->User->isAdmin) return;

		// Set root IDs
		if ( $this->hasRight ("all_teams" )) {
			$ids = $this->Database->prepare ( "SELECT id FROM tl_hoja_team" )->execute();
			$root = array ();
			while ( $ids->next() ) 
				$root[] = $ids->id;
		}
		elseif (!is_array($this->User->hoja_teams) || empty($this->User->hoja_teams))
			$root = array(0);
		else
			$root = $this->User->hoja_teams;

		$GLOBALS['TL_DCA']['tl_hoja_team']['list']['sorting']['root'] = $root;

		// Check permissions to add archives
		if (!$this->User->hasAccess('create', 'hoja_teamp'))
		{
				$GLOBALS['TL_DCA']['tl_hoja_team']['config']['closed'] = true;
		}
		
		
		// Check current action
		switch ($this->Input->get('act'))
		{
			case 'create':
			case 'select':
					// Allow
					break;

			case 'edit':
				// Dynamically add the record to the user profile
				if (!in_array($this->Input->get('id'), $root))
				{
					$arrNew = $this->Session->get('new_records');

					if (is_array($arrNew['tl_hoja_team']) && in_array($this->Input->get('id'), $arrNew['tl_hoja_team']))
					{
						// ok, this team is completly new! 

						// Add permissions on user level
						if ($this->User->inherit == 'custom' || !$this->User->groups[0])
						{
							if ($this->User->hasAccess ("create", "hoja_teamp" ))
							{
								$arrTeams = deserialize($objUser->hoja_teams);
								$arrTeams[] = $this->Input->get('id');

								$this->Database->prepare("UPDATE tl_user SET hoja_teams=? WHERE id=?")
															->execute(serialize($arrTeams), $this->User->id);
							}
						}

						// Add permissions on group level
						elseif ($this->User->groups[0] > 0)
						{
							// add only to the first group??!?!
							$objGroup = $this->Database->prepare("SELECT hoja_teams, hoja_teamp FROM tl_user_group WHERE id=?")
																				->limit(1)
																				->execute($this->User->groups[0]);

							$hojaTeamP = deserialize($objGroup->hoja_teamp);

							if (is_array($hojaTeamP) && in_array('create', $hojaTeamP))
							{
								$arrTeams = deserialize($objGroup->hoja_teams);
								$arrTeams[] = $this->Input->get('id');

								$this->Database->prepare("UPDATE tl_user_group SET hoja_teams=? WHERE id=?")
															->execute(serialize($arrTeams), $this->User->groups[0]);
							}
						}

						// Add new element to the user object
						$this->User->hoja_teams[] = $this->Input->get('id');
					}
				}
					// No break;
					
					
			case 'copy':
			case 'delete':
			case 'show':
				if (!in_array($this->Input->get('id'), $root) || ($this->Input->get('act') == 'delete' && !$this->User->hasAccess('delete', 'hoja_teamp')))
				{
					$this->log('Not enough permissions to '.$this->Input->get('act').' hoja Team ID "'.$this->Input->get('id').'"', 'tl_hoja_team checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				break;

			case 'editAll':
			case 'deleteAll':
			case 'overrideAll':
				$session = $this->Session->getData();
				if ($this->Input->get('act') == 'deleteAll' && !$this->User->hasAccess('delete', 'hoja_teamp'))
				{
						$session['CURRENT']['IDS'] = array();
				}
				else
				{
						$session['CURRENT']['IDS'] = array_intersect($session['CURRENT']['IDS'], $root);
				}
				$this->Session->setData($session);
				break;
					
			default:
					error_log ( "default" );
					if (strlen($this->Input->get('act')))
					{
							$this->log('Not enough permissions to '.$this->Input->get('act').' hoja team', 'tl_hoja_team checkPermission', TL_ERROR);
							$this->redirect('contao/main.php?act=error');
					}
					break;
		}
		

	}





	/**
	 * Return the edit header button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function editTeam($row, $href, $label, $title, $icon, $attributes)
	{
		return ($this->User->isAdmin || count(preg_grep('/^tl_hoja_team::/', $this->User->alexf)) > 0) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : '';
	}


	/**
	 * Return the copy archive button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function copyTeam($row, $href, $label, $title, $icon, $attributes)
	{
		return ($this->User->isAdmin || $this->User->hasAccess('create', 'hoja_teams')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : ' ';
	}


	/**
	 * Return the delete archive button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function deleteTeam($row, $href, $label, $title, $icon, $attributes)
	{
		return ($this->User->isAdmin || $this->User->hasAccess('delete', 'hoja_teams')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : ' ';
	}
	
	

	
}

?>
