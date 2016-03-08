<?php

class DefaultController
{

    public function home()
    {
        $view = new View('home');
        $view->display();
    }

    public function register(){

        $view = new View("register");
        $view->display();
    }

    public function login(){
        $view = new View("login");
        $view->display();
    }

    public function checkRegister(){
        $result = Model::querySingle("SELECT username, password FROM users WHERE username = ".$_POST["username"]);
        if($result){
            print "<h1>Diesen User gibt es schon</h1>";
        } else{
            if($_POST["password"] == $_POST["cpassword"]){
                Model::addUSer($_POST["username"], $_POST["password"]);
                print "<h1>OK</h1>";
            } else{
                print '<h1>Die Passwörter stimmen nicht überein</h1>';
            }
        }
    }

}
