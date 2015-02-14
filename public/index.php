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

/*
 * Config
 */
$config = [
    'db' => [
        'dsn'      => 'mysql:host=localhost;dbname=test',
        'username' => 'root',
        'password' => 'root'
    ]
];

/*
 * Init services
 */
$services = new Wired_Services();

$services->set(
    'db',
    function () use ($config) {
        $db = new PDO($config['db']['dsn'], $config['db']['username'], $config['db']['password']);

        return $db;
    }
);

$services->set(
    'events',
    function () {

        return new Wired_Events();
    }
);

$services->set(
    'smileReplacer',
    function () {
    
        return new Wired_Listeners_SmileReplacer();
    }
);

$services->set(
    'comments',
    function () use ($services) {
        $comments = new Wired_Repository($services->get('db'), 'comments', 'Wired_Models_Comment');
        $comments->setEventsManager($services->get('events'));
        
        return $comments;
    }
);

$services->set(
    'listeners',
    function () use ($services) {
        $listeners = new Wired_Repository($services->get('db'), 'listeners', 'Wired_Models_Listener');
        $listeners->setEventsManager($services->get('events'));

        return $listeners;
    }
);

/*
 * Init listeners 
 */
$listeners = $services->get('listeners')->get();
$events = $services->get('events');

foreach ($listeners as $listener) {
    $service = $services->get($listener->service);
    $events->addListener($listener->event, $service, $listener->priority);
}

/*
 * Index page controller
 */
if (isset($_POST['name']) && isset($_POST['text'])) {
    $comment = new Wired_Models_Comment();
    $comment->author = $_POST['name'];
    $comment->text = $_POST['text'];

    $services->get('comments')->save($comment);
}

require 'views/main.php';
