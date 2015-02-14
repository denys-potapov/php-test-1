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
class Wired_Listeners_SmileReplacerTest extends PHPUnit_Framework_TestCase
{
    
    public function testHandleGet()
    {
        $replacer = new Wired_Listeners_SmileReplacer();
        
        $comment = (object) array('text' => ':) <3');
        $replacer->handle('event', [$comment]);

        $this->assertEquals($comment->text, '<i class="fa fa-smile-o"></i> <i class="fa fa-heart"></i>');
    }
}
