<?php
/**
 * Created by PhpStorm.
 * User: jorgegonzalez
 * Date: 16/10/18
 * Time: 12:03
 */

//require '../../../config/Dependencies.php';
//$injector->share($request);
namespace Domain\Notes\Api;

//use Domain\Notes\Application\{CreateNoteUseCase as CreateNoteUseCase};

use Domain\Notes\Application\CreateNoteCommand;
use Domain\Notes\Application\CreateNoteUseCase;
use Domain\Notes\Application\GetNotesUseCase;
use Http\HttpRequest;
use Http\Request;

class ApiNotes
{
    private $request;
    private $composite;
    public function __construct(Request $request,$composite)
    {

        $this->request=$request;
        $this->composite=$composite;
    }
    public function getNotes(){

        $notes=GetNotesUseCase::getNotes($this->composite);
        if(!$notes instanceof \Exception){
            return $notes;
        }

        return header('HTTP/1.1 402 ','',402);
    }

    public function createNote(HttpRequest $request){
        $createNoteCommand=new CreateNoteCommand($request);
        if(!$this->composite->__invoke($createNoteCommand) instanceof \Exception){
            return array('note_title' => $createNoteCommand->getNoteTitle(),
                        'note_text' => $createNoteCommand->getNoteText());
        };
        return header('No se ha podido realizar la operacion',null , '404');

    }

}