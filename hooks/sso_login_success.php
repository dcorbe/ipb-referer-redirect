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
        try
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
        catch ( \RuntimeException $e )
        {
            if ( method_exists( get_parent_class(), __FUNCTION__ ) )
            {
                return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
            }
            else
            {
                throw $e;
            }
        }
    }
}
