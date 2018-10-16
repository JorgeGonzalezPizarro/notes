<?php
/**
 * Created by PhpStorm.
 * User: Jorge Gonzalez
 * Date: 16/10/2018
 * Time: 20:12
 */

class Note
{


    private $noteTitle;
    private $noteText;
    public function __construct(NoteTitle $noteTitle , NoteText $noteText)
    {
        $this->noteTitle=$noteTitle;
        $this->noteText=$noteText;

    }

    public static function createNote(NoteTitle $noteTitle,NoteText $noteText){

        return new self($noteTitle,$noteText);
    }
}