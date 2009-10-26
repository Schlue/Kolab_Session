<?php
/**
 * A mock container for the Kolab session information.
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
 * A mock container for the Kolab session information.
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
class Horde_Kolab_Session_Storage_Mock
implements Horde_Kolab_Session_Storage
{
    /**
     * The session information.
     */
    public $session;

    /**
     * Load the session information.
     *
     * @return Horde_Kolab_Session|boolean The session information or false if
     * it could not be loaded.
     */
    public function load()
    {
        return false;
    }

    /**
     * Save the session information.
     *
     * @param Horde_Kolab_Session $session The session information.
     *
     * @return NULL
     */
    public function save(Horde_Kolab_Session $session)
    {
        $this->session = $session;
    }
}
