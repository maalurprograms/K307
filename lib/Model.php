<?php
require_once 'ConnectionHandler.php';

class Model
{

    public static function getUser($username)
    {
        $query = "SELECT userID, username, password FROM users WHERE username = ?";
        return self::sendQuery($query, true, true, array("s", $username));

    }

    public static function addUser($username, $password){
        $query = 'insert into users (username, passwort) VALUES (?, ?)';
        self::sendQuery($query, false, true, array("ss", array($username, $password)));
    }

    public static function deleteUser($username)
    {
        $query = "DELETE FROM users WHERE username = ?";
        self::sendQuery($query, false, true, array("s", $username));
    }

    public static function getAllNotesFromUser($userid){
        $query = "select name, date, content from notes inner join users on users.userID=notes.IDuser where userID = ?";
        return self::sendQuery($query, true, true, array("i", $userid));
    }

    public static function addNote($name, $date, $content, $userid){
        $query = 'insert into notes (name, date, content, IDuser) VALUES (?, ?, ?, ?)';
        self::sendQuery($query, false, true, array("sssi", array($name, $date, $content, $userid)));
    }

    public static function deleteNote($id){
        $query = "DELETE FROM notes WHERE noteID = ?";
        self::sendQuery($query, false, true, array("i",$id));
    }

    private static function sendQuery($query, $needOutput, $bindParam, $paramlist=null){
        $statement = ConnectionHandler::getConnection()->prepare($query);
        if($bindParam){
            $statement->bind_param($paramlist[0], $paramlist[1]);
        }
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
