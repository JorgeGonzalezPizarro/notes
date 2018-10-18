<?php
/**
 * Created by PhpStorm.
 * User: Jorge Gonzalez
 * Date: 16/10/2018
 * Time: 20:18
 */
namespace App;

use PDO;
class MysqlRepository implements \NoteRepository
{

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;

    }

    public static function createDb($host,$username,$password){

// Create connection


        try{
            // create a PDO connection with the configuration data
            $pdo = new PDO("mysql:host=127.0.0.1;dbname=notes", $username, '');

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // display a message if connected to database successfully
            if($pdo){
                return new self($pdo);

            }
        }catch (\PDOException $e){
            // report error message
            echo $e->getMessage();
        }

    }


    public function createNote($note)
    {

        $sql=$this->pdo->prepare('INSERT INTO notes (id,note_title,note_text) VALUES(:id,:title,:text)');
        $this->pdo->exec([
            'id'=> $note->getId(),
            'name'=> $note->getNoteTitle(),
            'text'=> $note->getNoteText()
            ]);



    }

    public function getNotes()
    {
        try {
            $this->pdo->query('SELECT * from Note')->fetchAll();

        }catch (\Exception $exception){
            return new \Exception($exception);
        }
        }


}