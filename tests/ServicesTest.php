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
class Wired_ServicesTest extends PHPUnit_Framework_TestCase
{
    
    public function testGet()
    {
        $services = new Wired_Services();

        $services->set(
            'string', 
            function () {
                return 'test';
            }
        );
        
        $this->assertEquals($services->get('string'), 'test');
    }

    /**
     * @expectedException Exception
     */
    public function testException()
    {
        $services = new Wired_Services();
        $services->get('unknown');
    }
}
