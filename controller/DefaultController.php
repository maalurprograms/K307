<?php

class DefaultController
{

    public function home()
    {
        $view = new View('home');
        $view->display();
    }

    public function register(){
        $pdo = new PDO('mysql:host=localhost;dbname=swissnotes', 'root', '');

        $sql = 'select username from users where username = "'.$_POST["name"].'"';
        $result = $pdo->query($sql);
        $count = count($result->fetchAll());
        if($count > 0){
            print "<h1>Diesen User gibt es schon</h1>";
        } else{
            if($_POST["password"] == $_POST["cpassword"]){
                $sql = 'insert into users (username, passwort) VALUES ("'.$_POST["name"].'", "'.$_POST["password"].'")';
                $pdo->query($sql);
                print "<h1>OK</h1>";
            } else{
                print '<h1>Die Passwörter stimmen nicht überein</h1>';
            }
        }
    }
}
