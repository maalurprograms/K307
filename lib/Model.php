<?php
require_once 'ConnectionHandler.php';

class Model
{

    public static function  getUserID($username){
        $query = "SELECT userID FROM users WHERE username = ?";
        $mysqli = ConnectionHandler::getConnection();
        $statement = $mysqli->prepare($query);
        $statement->bind_param("s", $mysqli->escape_string($username));
        return self::sendQuery($statement, true)[0]["userID"];
    }

    public static function getUser($userid)
    {
        $query = "SELECT username, password FROM users WHERE userID = ?";
        $mysqli = ConnectionHandler::getConnection();
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i", $userid);
        return self::sendQuery($statement, true)[0];

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
        $query = "select noteID, `name`, content from notes inner join users on users.userID=notes.IDuser where userID = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("i", $userid);
        return self::sendQuery($statement, true);
    }

    public static function addNote($name, $content, $userid){
        $query = 'insert into notes (name, content, IDuser) VALUES (?, ?, ?)';
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("ssi", $name, $content, $userid);
        self::sendQuery($statement, false);
    }

    public static function deleteNote($id){
        $query = "DELETE FROM notes WHERE noteID = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("i", $id);
        self::sendQuery($statement, false);
    }

    public static function editNote($name, $content, $noteid){
        $query = "update notes set content=?,name=? where noteID = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("ssi", $content,$name,$noteid);
        self::sendQuery($statement, false);
    }

    private static function sendQuery($statement, $needOutput){
        $statement->execute();
        $result = $statement->get_result();
        if($needOutput) {
//            if (!$result) {
//                throw new Exception($statement->error);
//            }
            $rows = array();
            $i=0;
            while($row = $result->fetch_assoc()){
                $rows[$i]=$row;
                $i++;
            }
            $result->close();
            return $rows;
        }

    }
}
