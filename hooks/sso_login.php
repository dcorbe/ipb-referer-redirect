//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	exit;
}

class hook46 extends _HOOK_CLASS_
{

	/**
	 * Constructor
	 *
	 * @param	\IPS\Http\Url	$url		The URL page for the login screen
	 * @param	\IPS\Http\Url	$returnUrl	The URL to send the user back to after login
	 * @param	int				$type		One of the LOGIN_* constants
	 * @return	void
	 */
	public function __construct( \IPS\Http\Url $url=NULL, $type=1 )
	{
        if (isset($_GET['referer']))
        {
        	$_SESSION['referer'] = $_GET['referer'];
        }
		return parent::__construct( $url, $type );
	}

}
