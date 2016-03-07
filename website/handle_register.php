<?php
/**
 * Created by PhpStorm.
 * User: bcosaj
 * Date: 07.03.2016
 * Time: 16:01
 */

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