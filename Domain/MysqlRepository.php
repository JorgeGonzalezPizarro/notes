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

    public static function createDb($host,$username,$password,$db){

// Create connection


        try{
            // create a PDO connection with the configuration data
            $pdo = new PDO("mysql:host=".$host.";dbname=".$db."", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($pdo){
                return new self($pdo);

            }
        }catch (\PDOException $e){
            echo $e->getMessage();
        }

    }


    public function createNote($note)
    {

        try {
            $this->pdo->beginTransaction();
            $insert = $this->pdo->prepare('INSERT INTO Note (id,note_title,note_text) VALUES(:id,:title,:text)');
            $insert->bindParam(':id', $note->getId());
            $insert->bindParam(':title', $note->getNoteTitle());
            $insert->bindParam(':text', $note->getNoteText());
            $insert->execute();
            $this->pdo->commit();
        }catch (\Exception $exception){
            return $exception;
        }
    }

    public function getNotes()
    {
        try {
          return  $this->pdo->query('SELECT note_title,note_text from Note')->fetchAll();

        }catch (\Exception $exception){
            return new \Exception($exception);
        }
        }


}