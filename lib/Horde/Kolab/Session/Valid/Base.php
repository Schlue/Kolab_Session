<?php
/**
 * A class to check if the given session is valid.
 *
 * PHP version 5
 *
 * @category Kolab
 * @package  Kolab_Session
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.fsf.org/copyleft/lgpl.html LGPL
 * @link     http://pear.horde.org/index.php?package=Kolab_Session
 */

/**
 * A class to check if the given session is valid.
 *
 * The core user credentials (login, pass) are kept within the Auth module and
 * can be retrieved using <code>Auth::getAuth()</code> respectively
 * <code>Auth::getCredential('password')</code>. Any additional Kolab user data
 * relevant for the user session should be accessed via the Horde_Kolab_Session
 * class.
 *
 * Copyright 2009 The Horde Project (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @category Kolab
 * @package  Kolab_Session
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.fsf.org/copyleft/lgpl.html LGPL
 * @link     http://pear.horde.org/index.php?package=Kolab_Session
 */
class Horde_Kolab_Session_Valid_Base implements Horde_Kolab_Session_Valid
{
    /**
     * The session handler this instance provides with anonymous access.
     *
     * @var Horde_Kolab_Session
     */
    private $_session;

    /**
     * Provides authentication information for this object.
     *
     * @var Horde_Kolab_Session_Auth
     */
    private $_auth;

    /**
     * Constructor.
     *
     * @param Horde_Kolab_Session      $session The session that should be
     *                                          validated.
     * @param Horde_Kolab_Session_Auth $auth    The authentication handler.
     */
    public function __construct(
        Horde_Kolab_Session $session,
        Horde_Kolab_Session_Auth $auth
    ) {
        $this->_session = $session;
        $this->_auth    = $auth;
    }

    /**
     * Does the current session still match the authentication information?
     *
     * @param string $user The user the session information is being requested
     *                     for. This is usually empty, indicating the current
     *                     user.
     *
     * @return boolean True if the session is still valid.
     */
    public function isValid($user = null)
    {
        $mail = $this->_session->getMail();
        if ($this->_auth->getCurrentUser() != $mail) {
            return false;
        }
        if (empty($user)) {
            return true;
        }
        if ($user != $mail && $user != $this->_session->getUid()) {
            return false;
        }
        return true;
    }

    /**
     * Return the session this validator checks.
     *
     * @return Horde_Kolab_Session The session checked by this validator.
     */
    public function getSession()
    {
        return $this->_session;
    }

    /**
     * Return the auth driver of this validator.
     *
     * @return Horde_Kolab_Session_Auth The auth driver set for this validator.
     */
    public function getAuth()
    {
        return $this->_auth;
    }
}