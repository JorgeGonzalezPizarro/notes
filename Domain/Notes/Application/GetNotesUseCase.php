<?php
/**
 * Created by PhpStorm.
 * User: jorgegonzalez
 * Date: 18/10/18
 * Time: 16:43
 */

namespace Domain\Notes\Application;


class GetNotesUseCase
{
    private $noteRepository;
    public function __construct(\NoteRepository $noteRepositoryMysql)
    {
        $this->noteRepository=$noteRepositoryMysql;

    }

    public static function getNotes(\NoteRepository $noteRepository){

        return $noteRepository->getNotes();

    }
}