<?php
/**
 * Created by PhpStorm.
 * User: Jorge Gonzalez
 * Date: 16/10/2018
 * Time: 20:33
 */

class NoteTitle
{
    private $title;
    public function __construct($title)
    {
        $this->setTitle($title);
    }
    private function setTitle($title){
        if(empty($title) || !is_string($title)){
            return new Exception("El texto no debe estar vacio" , 400, null);

        }
        $this->title=$title;

    }


    public function __toString()
    {
        return $this->title;
    }
}