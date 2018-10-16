<?php
/**
 * Created by PhpStorm.
 * User: Jorge Gonzalez
 * Date: 16/10/2018
 * Time: 20:14
 */

class NoteCreator
{

    private $noteRepository;
    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository=$noteRepository;
    }


    public function __invoke(NoteTitle $noteTitle,NoteText $noteText)
    {
        $note=Note::createNote($noteTitle,$noteText);
        $this->noteRepository->createNote($note);

    }
}