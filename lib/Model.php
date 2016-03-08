<?php
require_once 'ConnectionHandler.php';

class Model
{

    public function getUser($username)
    {
        $query = "SELECT userID, username, password FROM users WHERE username = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("s", $username);
        return self::sendQuery($statement, true);

    }

    public static function addUser($username, $password){
        $query = 'insert into users (username, password) VALUES (?, ?)';
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("ss", $username,$password);
        self::sendQuery($statement, false);
    }

    public static function deleteUser($username)
    {
        $query = "DELETE FROM users WHERE username = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("s", $username);
        self::sendQuery($statement, false);
    }

    public static function getAllNotesFromUser($userid){
        $query = "select name, date, content from notes inner join users on users.userID=notes.IDuser where userID = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("i", $userid);
        return self::sendQuery($statement, true);
    }

    public static function addNote($name, $date, $content, $userid){
        $query = 'insert into notes (name, date, content, IDuser) VALUES (?, ?, ?, ?)';
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("sssi", $name,$date, $content, $userid);
        self::sendQuery($statement, false);
    }

    public static function deleteNote($id){
        $query = "DELETE FROM notes WHERE noteID = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("i", $id);
        self::sendQuery($statement, false);
    }

    private static function sendQuery($statement, $needOutput){
        $statement->execute();
        $result = $statement->get_result();
        if($needOutput) {
//            if (!$result) {
//                throw new Exception($statement->error);
//            }
            return $result->fetch_assoc();
            $result->close();
        }

    }
}
