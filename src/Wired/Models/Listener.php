<?php
/**
 * Event listeners model
 *
 * @category Test
 * @package  Wired
 * @author   Denys Potapov <denys.potapov@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://denyspotapov.com
 */
class Wired_Models_Listener extends Wired_Model
{
    /**
     * Events name
     *
     * @var string
     */
    public $event;

    /**
     * Service name
     *
     * @var string
     */
    public $service;

    /**
     * Priority
     * 
     * @var string
     */
    public $priority;
}
