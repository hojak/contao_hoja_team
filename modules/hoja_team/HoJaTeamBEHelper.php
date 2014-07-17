<?php

class HoJaTeamBEHelper extends Backend {

	
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
		$this->import('Database');
	}



	/**
	 * get a list of all teams including season and sport in the label for the permission list 
	 */
	public function getTeamOptionArray () {
	
		$objTeams = $this->Database->prepare("SELECT * from tl_hoja_team order by name")->execute($this->User->id);
	
		$result = array ();
		
		if ( $objTeams->numRows > 0) 
		{ 
			while ($objTeams->next())
			{
				$result[ $objTeams->id ] = $objTeams->name . " (" . $objTeams->league . ")";
			}
		}
		
		return $result;
	}
	
	
}
