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

    public function __construct(Request $request,$composite)
    {

        $this->request=$request;
        $this->composite=$composite;
    }
    public function getNotes(){

        $notes=GetNotesUseCase::getNotes($this->composite);
        if(!$notes instanceof \Exception){
            return json_encode($notes);
        }
        return json_encode(array("aa"=>"aaQ"));

        return header('HTTP/1.1 402 ','',402);
    }

    public function createNote(HttpRequest $request){
        $content=$this->request->getParameters();
//        $noteTitle="a";
//        $noteText="b";
        $noteTitle=$request->getParameter('note_title');
        $noteText=$request->getParameter('note_text');
        $createNoteCommand=new CreateNoteCommand($noteTitle,$noteText);
        if(!$this->composite->__invoke($createNoteCommand) instanceof \Exception){
            return array('note_title' => $noteTitle,
                        'note_text' => $noteText);
        };
        return header('No se ha podido realizar la operacion',null , '404');

    }

}