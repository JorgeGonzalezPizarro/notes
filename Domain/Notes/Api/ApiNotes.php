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
use Http\Request;

class ApiNotes
{

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
        return new \Error("Error al recuperar las notas " , 400, null);
    }

    public function createNote(){
        $content=$this->request->getParameters();
        $noteTitle="a";
        $noteText="b";
        $createNoteCommand=new CreateNoteCommand($noteTitle,$noteText);
        $this->composite->__invoke($createNoteCommand);

    }

}