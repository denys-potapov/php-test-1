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
    protected function getDbMock()
    {
        $statement = $this->getMockBuilder('StdClass')->setMethods(['execute'])->getMock();
        $db = $this->getMockBuilder('StdClass')->setMethods(['prepare'])->getMock();

        $db->method('prepare')
            ->willReturn($statement);

        return $db;
    }

    public function testSave()
    {
        $db = $this->getDbMock();

        $db->expects($this->once())
            ->method('prepare')
            ->with($this->equalTo('INSERT INTO comments (string, int) VALUES (:string, :int)'));

        $repository = new Wired_Repository($db, 'comments', 'StdClass');
        $object = (object) array('string' => 'string', 'int' => 1);
        $repository->save($object);
    }

    public function testEvents()
    {
        $db = $this->getDbMock();

        $events = $this->getMockBuilder('Wired_Events')->setMethods(['fire'])->getMock();
        $events->expects($this->at(0))
            ->method('fire')
            ->with($this->equalTo('Model:StdClass:beforeSave'), $this->anything());

        $events->expects($this->at(1))
            ->method('fire')
            ->with($this->equalTo('Model:StdClass:afterSave'),  $this->anything());

        $repository = new Wired_Repository($db, 'comments', 'StdClass');
        $repository->setEventsManager($events);

        $object = (object) array('string' => 'string', 'int' => 1);
        $repository->save($object);
    }
}
