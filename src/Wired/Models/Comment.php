<?php
/**
 * Comments model
 *
 * @category Test
 * @package  Wired
 * @author   Denys Potapov <denys.potapov@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://denyspotapov.com
 */
class Wired_Models_Comment extends Wired_Model
{
    /**
     * Author name
     *
     * @var string
     */
    public $author;

    /**
     * Comment text
     *
     * @var string
     */
    public $text;
}
