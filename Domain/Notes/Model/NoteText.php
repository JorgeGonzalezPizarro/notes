<?php
/**
 * Created by PhpStorm.
 * User: Jorge Gonzalez
 * Date: 16/10/2018
 * Time: 20:32
 */

class NoteText
{
    private $text;

    public function __construct($text)
    {
        $this->setText($text);
    }


    private function setText($text){
        if(empty($text) || !is_string($text)) {
            new Exception("El texto no debe estar vacio" , 400, null);

        }
        $this->text = $text;

    }


    public function __toString()
    {
        return $this->text;
    }

}