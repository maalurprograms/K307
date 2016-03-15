<?php
require_once 'ConnectionHandler.php';

class Model
{

    /*
     * Queries the DB and fetches the user ID of a specified user.
     *
     * @param string $username - String containing a username
     * @return int - Table ID for specified user
     */
    public static function  getUserID($username){
        $query = "SELECT userID FROM users WHERE username = ?";
        $mysqli = ConnectionHandler::getConnection();
        $statement = $mysqli->prepare($query);
        $statement->bind_param("s", $mysqli->escape_string($username));
        $data = self::sendQuery($statement, true);
        if($data) {
            return self::sendQuery($statement, true)[0]["userID"];
        }
        else {
            return Null;
        }
    }

    /*
     * Fetches all user data for a specific user as specified by the provided user ID
     *
     * @param int $userid - ID of a user
     * @return array - Array of all parameters of a specific usr from the table users
     */
    public static function getUser($userid)
    {
        $query = "SELECT username, password FROM users WHERE userID = ?";
        $mysqli = ConnectionHandler::getConnection();
        $statement = $mysqli->prepare($query);
        $statement->bind_param("i", $userid);
        $data = self::sendQuery($statement, true);
        if($data) {
            return self::sendQuery($statement, true)[0];
        }
    }

    /*
     * Inserts a new user into the database
     *
     * @param string $username - Username of a new user
     * @param string $password - Password of a new user
     */
    public static function addUser($username, $password){
        $query = 'insert into users (username, password) VALUES (?, ?)';
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("ss", htmlspecialchars($username),htmlspecialchars($password));
        self::sendQuery($statement, false);
    }

    /*
     * Queries the DB and fetches all notes pertaining to a specific user as specified by the given user ID
     *
     * @param int $userid - User id of a specific user
     * @return array - List of notes
     */
    public static function getAllNotesFromUser($userid){
        $query = "select noteID, `name`, content from notes inner join users on users.userID=notes.IDuser where userID = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("i", $userid);
        return self::sendQuery($statement, true);
    }

    /*
     * Inserts a new note into the database
     *
     * @param string $name - note title
     * @param string $content - Note content
     * @param int $userid - ID of this notes owner
     */
    public static function addNote($name, $content, $userid){
        $query = 'insert into notes (name, content, IDuser) VALUES (?, ?, ?)';
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("ssi", $name, $content, $userid);
        self::sendQuery($statement, false);
    }

    /*
     * Deletes a note with the provided ID from the database
     *
     * @param int $id - Note id
     */
    public static function deleteNote($id){
        $query = "DELETE FROM notes WHERE noteID = ?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("i", $id);
        self::sendQuery($statement, false);
    }

    /*
     * Updates a specific note with the given note ID in the DB with the given name & content
     *
     * @param string $name - Note title
     * @param string $content - Note content
     * @param int $noteid - Note ID
     */
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
