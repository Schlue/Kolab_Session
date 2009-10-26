<?php
/**
 * Base for session testing.
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
 * Base for session testing.
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
class Horde_Kolab_Session_SessionTestCase extends PHPUnit_Framework_TestCase
{
    protected function _getComposite()
    {
        return $this->getMock(
            'Horde_Kolab_Server_Composite', array(), array(), '', false, false
        );
    }

    protected function _getMockedComposite()
    {
        return new Horde_Kolab_Server_Composite(
            $this->getMock('Horde_Kolab_Server'),
            $this->getMock('Horde_Kolab_Server_Objects'),
            $this->getMock('Horde_Kolab_Server_Structure'),
            $this->getMock('Horde_Kolab_Server_Search'),
            $this->getMock('Horde_Kolab_Server_Schema')
        );
    }

    protected function setupLogger()
    {
        $this->logger = $this->getMock('Horde_Log_Logger');
    }

    protected function setupStorage()
    {
        $this->storage = $this->getMock('Horde_Kolab_Session_Storage');
    }

    protected function setupFactoryMocks()
    {
        $this->server          = $this->_getMockedComposite();
        $this->session_auth    = $this->getMock('Horde_Kolab_Session_Auth');
        $this->session_storage = $this->getMock('Horde_Kolab_Session_Storage');
    }
}