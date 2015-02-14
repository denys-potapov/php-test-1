<?php
/**
 * Entry point for commenting system.
 *
 * File combines:
 * - config
 * - router and dispatch cycle
 * - comments controller
 *
 * @category Test
 * @package  Wired
 * @author   Denys Potapov <denys.potapov@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://denyspotapov.com
 */

require '../vendor/autoload.php';

$services = new Wired_Services();

require 'views/main.php';
