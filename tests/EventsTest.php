<?php
/**
 * Testing file
 *
 * @category TestTests
 * @package  Wired
 * @author   Denys Potapov <denys.potapov@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://denyspotapov.com
 */
class Wired_EventsTest extends PHPUnit_Framework_TestCase
{
    public function testFire()
    {
        $listener = $this->getMockBuilder('Wired_IListener')->setMethods(['handle'])->getMock();
        $listener->expects($this->once())
            ->method('handle');

        $events = new Wired_Events();
        $events->addListener('someEvent', $listener);
        $events->fire('someEvent');
    }
}
