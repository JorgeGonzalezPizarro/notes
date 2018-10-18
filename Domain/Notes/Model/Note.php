<?php
/**
 * Created by PhpStorm.
 * User: Jorge Gonzalez
 * Date: 16/10/2018
 * Time: 20:12
 */

class Note
{

    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNoteTitle()
    {
        return $this->noteTitle;
    }

    /**
     * @return mixed
     */
    public function getNoteText()
    {
        return $this->noteText;
    }
    private $noteTitle;
    private $noteText;
    public function __construct($id,$noteTitle , $noteText)
    {
        $this->id=$id;
        $this->noteTitle=$noteTitle;
        $this->noteText=$noteText;

    }

    public static function createNote($id,$noteTitle, $noteText){

        return new self($id,$noteTitle,$noteText);
    }
}