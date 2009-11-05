<?php
/**
 * Defines storage containers for the Kolab session information.
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
 * Defines storage containers for the Kolab session information.
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
class Horde_Kolab_Session_Storage_Sessionobjects
implements Horde_Kolab_Session_Storage_Interface
{
    /**
     * The handler for session objects.
     *
     * @var Horde_SessionObjects
     */
    private $_session_objects;

    /**
     * Constructor
     *
     * @param Horde_SessionObjects $session_objects The session objects handler.
     */
    public function __construct(Horde_SessionObjects $session_objects)
    {
        $this->_session_objects = $session_objects;
    }

    /**
     * Load the session information.
     *
     * @return Horde_Kolab_Session|boolean The session information or false if
     * it could not be loaded.
     */
    public function load()
    {
        return $this->_session_objects->query('kolab_session');
    }

    /**
     * Save the session information.
     *
     * @param Horde_Kolab_Session_Interface $session The session information.
     *
     * @return NULL
     */
    public function save(Horde_Kolab_Session_Interface $session)
    {
        $this->_session_objects->overwrite('kolab_session', $session);
    }
}
