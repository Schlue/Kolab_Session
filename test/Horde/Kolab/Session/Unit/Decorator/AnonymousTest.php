<?php
/**
 * Test the anonymous decorator.
 *
 * PHP version 5
 *
 * @category Kolab
 * @package  Kolab_Session
 * @author   Gunnar Wrobel <wrobel@pardus.de>
 * @license  http://www.horde.org/licenses/lgpl21 LGPL 2.1
 */

/**
 * Test the anonymous decorator.
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
class Horde_Kolab_Session_Unit_Decorator_AnonymousTest
extends Horde_Kolab_Session_TestCase
{
    public function testMethodConnectHasPostconditionThatTheConnectionHasBeenEstablishedAsAnonymousUserIfRequired()
    {
        $session = $this->getMockBuilder('Horde_Kolab_Session')->getMock();
        $session->expects($this->once())
            ->method('connect')
            ->with('anonymous', array('password' => 'pass'));
        $anonymous = new Horde_Kolab_Session_Decorator_Anonymous(
            $session, 'anonymous', 'pass'
        );
        $anonymous->connect();
    }

    public function testMethodGetidReturnsNullIfConnectedUserIsAnonymousUser()
    {
        $session = $this->getMockBuilder('Horde_Kolab_Session')->getMock();
        $session->expects($this->once())
            ->method('getId')
            ->will($this->returnValue('anonymous'));
        $anonymous = new Horde_Kolab_Session_Decorator_Anonymous(
            $session, 'anonymous', 'pass'
        );
        $this->assertNull($anonymous->getId());
    }

    public function testMethodConnectGetsDelegated()
    {
        $session = $this->getMockBuilder('Horde_Kolab_Session')->getMock();
        $session->expects($this->once())
            ->method('connect')
            ->with(array('password' => 'pass'));
        $anonymous = new Horde_Kolab_Session_Decorator_Anonymous(
            $session, 'anonymous', 'pass'
        );
        $anonymous->connect(array('password' => 'pass'));
    }

    public function testMethodGetidGetsDelegated()
    {
        $session = $this->getMockBuilder('Horde_Kolab_Session')->getMock();
        $session->expects($this->once())
            ->method('getId')
            ->will($this->returnValue('1'));
        $anonymous = new Horde_Kolab_Session_Decorator_Anonymous(
            $session, 'anonymous', 'pass'
        );
        $anonymous->getId();
    }
}
