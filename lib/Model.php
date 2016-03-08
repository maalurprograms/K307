<?php

require_once 'ConnectionHandler.php';

class Model
{

    public static function getUser($username)
    {
        $query = "SELECT userID, username, password FROM users WHERE username = ".$username;
        $rows = self::sendQuery($query, true);
        if(count($rows) > 0) {
            return $rows;
        }else {
            return false;
        }
    }

    public static function addUser($username, $password){
        $query = 'insert into users (username, passwort) VALUES ("'.$username.'", "'.$password.'")';
        self::sendQuery($query, false);
    }

    public static function deleteUser($username)
    {
        $query = "DELETE FROM users WHERE username = ".$username;
        self::sendQuery($query, false);
    }

    public static function getAllNotesFromUser($userid){
        $query = "select name, date, content from notes inner join users on users.userID=notes.IDuser where userID = ".$userid;
        $rows = self::sendQuery($query, true);
        if(count($rows) > 0) {
            return $rows;
        }else {
            return false;
        }
    }

    public static function addNote($name, $date, $content, $userid){
        $query = 'insert into notes (name, date, content, IDuser) VALUES ("'.$name.'", "'.$date.'", "'.$content.'", "'.$userid.'")';
        self::sendQuery($query, false);
    }

    public static function deleteNote($id){
        $query = "DELETE FROM notes WHERE noteID = ".$id;
        self::sendQuery($query, false);
    }

    private static function sendQuery($query, $needOutput){
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }
        if($needOutput) {
            return $result->fetch_assoc();
        }
        $result->close();
    }
}
