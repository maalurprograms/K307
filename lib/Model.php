<?php

require_once 'ConnectionHandler.php';

class Model
{

    public static function querySingle($query)
    {
        return self::sendQuery($query, true);
    }

    public static function addUSer($username, $password){
        $query = 'insert into users (username, passwort) VALUES ("'.$username.'", "'.$password.'"';
    }

    public static function deleteUser($username)
    {
        $query = "DELETE FROM users WHERE username = ".$username;
        self::sendQuery($query, false);
    }

    public static function deleteNote($id){
        $query = "DELETE FROM notes WHERE noteID = ?";
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
            $row = $result->fetch();
            $result->close();
            return $row;
        }else{
            $result->close();
        }
    }
}
