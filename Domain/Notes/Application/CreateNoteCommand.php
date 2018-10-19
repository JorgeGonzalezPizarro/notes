<?php
/**
 * Created by PhpStorm.
 * User: jorgegonzalez
 * Date: 18/10/18
 * Time: 15:15
 */

namespace Domain\Notes\Application;


use Http\HttpRequest;

class CreateNoteCommand
{
    private $noteTitle;
    private $noteText;
    public function __construct(HttpRequest $request)
    {
        $this->noteTitle=$request->getParameter('note_title');
        $this->noteText=$request->getParameter('note_text');
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