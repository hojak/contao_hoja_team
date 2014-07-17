<?php

class ContentHoJaTeamDescription extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_hoja_team_description';

	
	/**
	 * Import the back end user object
	 */
	public function __construct( $param )
	{
		parent::__construct( $param );
		$this->import('Database');
	}
	
	
	
	protected function loadTeam ( $id ) {
		$objTeam = $this->Database->prepare("SELECT * from tl_hoja_team WHERE id=?")->execute( $id );
	
		if ( $objTeam->numRows >= 1 ) {
			//$objTeam->next();
			return $objTeam->row();
		 } else 
			return null;
	}
	
	
	
	
	/**
	 * Generate the content element
	 */
	protected function compile()
	{
		$this->Template->team_id = $this->hoja_team_id;
		
		$this->Template->team = $this->loadTeam ( $this->hoja_team_id );
		if ( $this->Template->team == null ) {
			// fehler: team existiert nicht!
			$this->log('Content Element access to non existent HoJa Team ' . $this->hoja_team_id, 'ContentPTSVTeamList compile', TL_ERROR);
			return;
		}
	}

}
