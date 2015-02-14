<?php
/**
 * Event listener interface
 *
 * @category Test
 * @package  Wired
 * @author   Denys Potapov <denys.potapov@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://denyspotapov.com
 */
interface Wired_IListener
{

    /**
     * Handle event funciton
     *
     * @param string $event   event name
     * @param array  $payload event payload
     * 
     * @return void
     */
    public function handle($event, $payload);
}