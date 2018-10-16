<?php
/**
 * Created by PhpStorm.
 * User: Jorge Gonzalez
 * Date: 16/10/2018
 * Time: 20:18
 */

class MysqlRepository implements NoteRepository
{

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;

    }

    public static function createDb($host,$username,$password){

        $pdo=new PDO($host,$username,$password,PDO::ATTR_ERRMODE);
        return new self($pdo);

    }


    public function createNote()
    {

        $this->pdo->query();
    }

    public function getNotes()
    {
        $this->pdo->query();
    }
}