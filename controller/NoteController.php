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
        Model::addNote($_POST["note_title"], $_POST["note_content"], $_SESSION["userID"]);
        $_SESSION["notes"] = Model::getAllNotesFromUser($_SESSION["userID"]);;
        header("Location: ../note/home");
        $view = new View('account');
        $view->display();
    }

    public function edit(){
        session_start();
        Model::editNote($_POST["note_title"], $_POST["note_content"], $_POST["noteID"]);
        $_SESSION["notes"] = Model::getAllNotesFromUser($_SESSION["userID"]);
        header("Location: ../note/home");
        $view = new View('account');
        $view->display();
    }

    public function delete(){
        session_start();
        Model::deleteNote($_POST["noteID"]);
        $_SESSION["notes"] = Model::getAllNotesFromUser($_SESSION["userID"]);
        header("Location: ../note/home");
        $view = new View('account');
        $view->display();
    }

    public  function home(){
        session_start();
        if(!isset($_SESSION["userID"])){
            $view = new View("error");
            $view->errorMsg = "Sie sind nicht angemeldet";
            $view->display();
        } else{
            $view = new View("account");
            $view->display();
        }
    }
}