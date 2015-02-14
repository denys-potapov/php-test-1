<?php
/**
 * Repository for storing objects in DB
 *
 * @category Test
 * @package  Wired
 * @author   Denys Potapov <denys.potapov@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://denyspotapov.com
 */
class Wired_Repository
{

    protected $db;

    protected $events;

    protected $table;

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
     * Save object in DB
     *
     * @param mixed $object object for storing in db
     *
     * @return void
     */
    public function save($object)
    {
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
