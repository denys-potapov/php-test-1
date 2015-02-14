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
class Wired_RepositoryTest extends PHPUnit_Framework_TestCase
{
    public function testSave()
    {
        $statement = $this->getMockBuilder('StdClass')->setMethods(['execute'])->getMock();
        $db = $this->getMockBuilder('StdClass')->setMethods(['prepare'])->getMock();

        $db->method('prepare')
            ->willReturn($statement);

        $db->expects($this->once())
            ->method('prepare')
            ->with($this->equalTo('INSERT INTO comments (string, int) VALUES (:string, :int)'));

        $repository = new Wired_Repository($db, 'comments', 'StdClass');
        $object = (object) array('string' => 'string', 'int' => 1);
        $repository->save($object);
    }
}
