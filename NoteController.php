<?php
/**
 * Created by PhpStorm.
 * User: Jorge Gonzalez
 * Date: 16/10/2018
 * Time: 20:30
 */

class NoteController
{

    public function getNotes(\http\Env\Request $request){

        return new NoteCreator(
            new NoteText($request->getQuery('text')),
            new NoteTitle($request->getQuery('title'))
        );

    }

}