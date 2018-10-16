<?php
/**
 * Created by PhpStorm.
 * User: Jorge Gonzalez
 * Date: 16/10/2018
 * Time: 20:16
 */

interface NoteRepository
{

    public function createNote();
    public function getNotes();
}