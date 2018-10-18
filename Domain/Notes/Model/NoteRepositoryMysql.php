<?php
/**
 * Created by PhpStorm.
 * User: Jorge Gonzalez
 * Date: 16/10/2018
 * Time: 20:16
 */

class NoteRepositoryMysql extends MysqlRepository implements NoteRepository
{


    public function __construct(PDO $pdo)
    {
        parent::__construct($pdo);

    }

    public function createNote()
    {

    }

    public function getNotes()
    {

    }
}