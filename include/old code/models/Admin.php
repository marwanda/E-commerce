<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/13/2018
 * Time: 12:34 PM
 */

class Admin
{
    private $conn;
    // private $table = 'consultation';

    // Post Properties
    public $id;
    public $name;
    public $gender;
    public $content;
    public $subject;
    public $headline;
    public $views;
    public $date;
    public $pic;
    public  $userId;



    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function login ($mail,$pass)
    {
        $query='select id, name from admin where email ="'.$mail.'" and password = "'.$pass.'"';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}