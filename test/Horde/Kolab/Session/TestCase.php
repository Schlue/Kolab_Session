<?php
/**
 * Base for session testing.
 *
 * PHP version 5
 *
 * @category Kolab
 * @package  Kolab_Session
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */

/**
 * Base for session testing.
 *
 * Copyright 2009-2017 Horde LLC (http://www.horde.org/)
 *
 * See the enclosed file COPYING for license information (LGPL). If you
 * did not receive this file, see http://www.horde.org/licenses/lgpl21.
 *
 * @category Kolab
 * @package  Kolab_Session
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */
#[\AllowDynamicProperties]
class Horde_Kolab_Session_TestCase extends Horde_Test_Case
{
    protected function _getComposite()
    {
        return $this->getMockBuilder('Horde_Kolab_Server_Composite')
                    ->disableOriginalConstructor()
                    ->disableOriginalClone()
                    ->getMock();
    }

    protected function _getMockedComposite()
    {
        return new Horde_Kolab_Server_Composite(
            $this->getMockBuilder('Horde_Kolab_Server_Interface')->getMock(),
            $this->getMockBuilder('Horde_Kolab_Server_Objects_Interface')->getMock(),
            $this->getMockBuilder('Horde_Kolab_Server_Structure_Interface')->getMock(),
            $this->getMockBuilder('Horde_Kolab_Server_Search_Interface')->getMock(),
            $this->getMockBuilder('Horde_Kolab_Server_Schema_Interface')->getMock()
        );
    }

    protected function setupLogger()
    {
        $this->logger = $this->getMockBuilder('Horde_Log_Logger')->getMock();
    }

    protected function setupStorage()
    {
        $this->storage = $this->getMockBuilder('Horde_Kolab_Session_Storage')->getMock();
    }

    protected function setupFactoryMocks()
    {
        $this->server          = $this->_getMockedComposite();
        $this->session_storage = $this->getMockBuilder('Horde_Kolab_Session_Storage')->getMock();
    }
}