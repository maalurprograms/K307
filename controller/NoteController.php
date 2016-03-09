<?php

/**
 * Created by PhpStorm.
 * User: bcosaj
 * Date: 09.03.2016
 * Time: 10:30
 */
class NoteController
{
    public function save(){
        session_start();
        $name = $_POST["note_title"];
        $content = $_POST["note_content"];
        Model::addNote($name, getdate(), $content, $_SESSION["userID"]);
    }
}