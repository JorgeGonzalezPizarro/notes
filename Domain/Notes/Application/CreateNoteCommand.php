<?php
/**
 * Created by PhpStorm.
 * User: jorgegonzalez
 * Date: 18/10/18
 * Time: 15:15
 */

namespace Domain\Notes\Application;


class CreateNoteCommand
{
    private $noteTitle;
    private $noteText;
    public function __construct($request)
    {
        $this->noteTitle="a";
        $this->noteText="a";
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

}