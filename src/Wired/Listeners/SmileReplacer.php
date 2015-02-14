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
class Wired_Listeners_SmileReplacer implements Wired_IListener
{
    /**
     * Smiles replacment patter 
     * 
     * @var array
     */
    protected static $smiles = array(
            ':)' => '<i class="fa fa-smile-o"></i>',
            '&lt;3' => '<i class="fa fa-heart"></i>',
            '0+' => '<i class="fa fa-venus"></i>'
    );

    /**
     * Comments update handler replaces smiles
     *
     * @param string $event   event name
     * @param array  $payload array of one Wired_Models_Comment
     * 
     * @return void
     */
    public function handle($event, $payload)
    {
        $comment = $payload[0];
        $text = htmlspecialchars($comment->text);
        $text = str_replace(
            array_keys(self::$smiles),
            self::$smiles,
            $text
        );

        $comment->text = $text;
    }
}
