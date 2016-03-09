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
        Model::addNote($name, $content, $_SESSION["userID"]);
        $view = new View('account');
        $view->userData = $_SESSION["userID"];
        $view->notes = Model::getAllNotesFromUser($view->userData);
        $view->display();
    }

    public function edit(){
        session_start();
        $name = $_POST["note_title"];
        $content = $_POST["note_content"];
        Model::editNote($name, $content,    $_POST["noteID"]);
        $view = new View('account');
        $view->userData = $_SESSION["userID"];
        $view->notes = Model::getAllNotesFromUser($view->userData);
        $view->display();
    }
}