//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    exit;
}

class hook12 extends _HOOK_CLASS_
{
    /**
     * Process the login - set the session data, and send required cookies
     *
     * @return  void
     */
    public function process()
    {
        $ret = parent::process();
        if (isset($_SESSION['referer']))
        {
            $rurl = $_SESSION['referer'];
            unset($_SESSION['referer']);
            \IPS\Output::i()->redirect(\IPS\Http\Url::external($rurl));
        }
        return $ret;
    }
}
