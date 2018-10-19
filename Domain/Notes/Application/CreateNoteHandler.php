<?php
/**
 * Created by PhpStorm.
 * User: jorgegonzalez
 * Date: 18/10/18
 * Time: 15:15
 */

namespace Domain\Notes\Application;


class CreateNoteHandler implements CommandHandler
{
    private $createNoteUseCase;
    public function __construct(CreateNoteUseCase $createNoteUseCase)
    {
        $this->createNoteUseCase=$createNoteUseCase;

    }

    public function __invoke(CreateNoteCommand $createNoteCommand)
    {
        $this->createNoteUseCase->createNote(
            new \NoteTitle($createNoteCommand->getNoteTitle()),
            new \NoteText($createNoteCommand->getNoteText())
        );

    }
}