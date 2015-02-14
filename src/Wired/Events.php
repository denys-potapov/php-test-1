<?php
/**
 * Base class for models
 *
 * @category Test
 * @package  Wired
 * @author   Denys Potapov <denys.potapov@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://denyspotapov.com
 */
class Wired_Events
{

    /**
     * Array of listeners
     * string event => [int priotity => Wired_IListener[] listeners]
     *
     * @var array
     */
    protected $listeners = array();

    /**
     * [addListener description]
     * 
     * @param string          $event    event name
     * @param Wired_IListener $listener listener
     * @param integer         $priority priority (small priority first)
     *
     * @return void
     */
    public function addListener($event, Wired_IListener $listener, $priority = 100)
    {
        if (!isset($this->listeners[$event])) {
            $this->listeners[$event] = array();
        }

        if (!isset($this->listeners[$event][$priority])) {
            $this->listeners[$event][$priority] = array();
        }

        $this->listeners[$event][$priority][] = $listener;
    }

    /**
     * Fire event and call listeners
     * 
     * @param string $event   event name
     * @param mixed  $payload event payload
     * 
     * @return void
     */
    public function fire($event, $payload = null)
    {
        if (!isset($this->listeners[$event])) {

            return ;
        }

        foreach ($this->listeners[$event] as $priority => $listeners) {
            foreach ($listeners as $listener) {
                $listener->handle($event, $payload);
            }
        }
    }
}
