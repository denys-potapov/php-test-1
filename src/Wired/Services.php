<?php
/**
 * Service locator
 *
 * @category Test
 * @package  Wired
 * @author   Denys Potapov <denys.potapov@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://denyspotapov.com
 */
class Wired_Services
{
    /**
     * Array of services
     *
     * @var array
     */
    protected $services = array();

    /**
     * Array of functions to init services
     *
     * @var array
     */
    protected $closures = array();

    /**
     * Set service
     *
     * @param string  $name    service name
     * @param closure $closure anonymous functions to init service
     */
    public function set($name, $closure)
    {
        $this->closures[$name] = $closure;
    }

    /**
     * Get service init it if needed
     * 
     * @param string $name service name
     * 
     * @return mixed        service object
     */
    public function get($name)
    {
        if (isset($this->services[$name])) {
            return $this->services[$name];
        }

        if (!isset($this->closures[$name])) {
            throw new Exception("Service not found");
        }

        $closure = $this->closures[$name];
        $service = $closure();
        $this->services[$name] = $service;

        return $service;
    }
}
