<?php
/**
 * Created by PhpStorm.
 * User: jorgegonzalez
 * Date: 17/10/18
 * Time: 12:36
 */
namespace Domain\Notes\Application;

use Ramsey\Uuid\Uuid;

class CreateNoteUseCase
{


    private $noteRepository;
    public function __construct(\NoteRepository $noteRepositoryMysql)
    {
        $this->noteRepository=$noteRepositoryMysql;

    }

    public function createNote($text,$title){

        $note=\Note::createNote(Uuid::uuid1()->toString(),$text,$title);
        $this->noteRepository->createNote($note);

    }
}