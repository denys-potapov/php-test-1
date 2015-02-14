<?php
/**
 * Repository for storing and retriving  objects in DB
 *
 * @category Test
 * @package  Wired
 * @author   Denys Potapov <denys.potapov@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://denyspotapov.com
 */
class Wired_Repository
{
    /**
     * Database connection
     * 
     * @var PDO
     */
    protected $db;

    /**
     * Events manager
     * 
     * @var Wired_Events
     */
    protected $events;

    /**
     * Tablke name for storing and retriving objects
     * @var string
     */
    protected $table;

    /**
     * Class name for returned objects
     * 
     * @var string
     */
    protected $class;

    /**
     * Creates repository
     *
     * @param PDO    $db    database connection
     * @param string $table table name
     * @param string $class class name for stored object
     */
    public function __construct($db, $table, $class)
    {
        $this->db = $db;
        $this->table = $table;
        $this->class = $class;
    }

    /**
     * Set events manager
     * 
     * @param Wired_Events $events events manager
     *
     * @return void 
     */
    public function setEventsManager($events)
    {
        $this->events = $events;
    }

    /**
     * Fire model event
     * 
     * @param string  $event   event name
     * @param mixed[] $payload array of event payload
     * 
     * @return void 
     */
    protected function fireEvent($event, $payload)
    {
        if (!isset($this->events)) {

            return;
        }

        $this->events->fire('Model:' . $this->class . ':' . $event, $payload);
    }

    /**
     * Save object in DB
     *
     * @param mixed $object object for storing in db
     *
     * @return void
     */
    public function save($object)
    {
        $this->fireEvent('beforeSave', [$object]);
        
        $fields = array();
        $bind = array();
        foreach ($object as $field => $value) {
            $fields[] = $field;
            $bind[':' . $field] = $value;
        }

        $query = 'INSERT INTO ' . $this->table .
               ' (' . implode(', ', $fields) . ') ' .
               'VALUES (' . implode(', ', array_keys($bind)) . ')';
        $statement = $this->db->prepare($query);
        $statement->execute($bind);
        
        $this->fireEvent('afterSave', $object);
    }

    /**
     * Get all objects from db.
     *
     * Returns array of objects of class passed whuile constructing
     *
     * @return mixed array of objects
     */
    public function get()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $cursor = $this->db->query($query, PDO::FETCH_CLASS, $this->class);

        return $cursor->fetchAll();
    }

}
