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

use Domain\Notes\Application\CreateNoteUseCase;

class ApiNotes
{

    public function __construct($request,$repository)
    {

        $this->request=$request;
        $this->repository=$repository;
    }
    public function getNotes(){
         $content=$this->request->getParameters();
         $createNoteUseCase=new CreateNoteUseCase($this->repository);
         $createNoteUseCase->createNote($this->request,$this->request);

    }

    public function createNote(){
        $content=$this->request->getParameters();
        $createNoteUseCase=new CreateNoteUseCase($this->repository);
        $createNoteUseCase->createNote('aa','aa');

    }

}