<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/13/2018
 * Time: 12:34 PM
 */

class User
{

    private $conn;
    public $id;
    public $name;
    public $email;
    public $password;
    public $phone;
    public $pic;
    public $gender;
    public $age;



    public function __construct($db)
    {
        $this->conn = $db;
    }
    function login ($mail,$pass)
    {
        $query='select id, name from user where email ="'.$mail.'" and password = "'.$pass.'"';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;

    }

    public function addUser($name,$email,$password,$phone,$gender,$pic,$age)
    {
        // Create query

        $query = 'INSERT INTO user SET name = :name, email = :email, password = :password, pic = :pic, phone = :phone, age= :age,gender = :gender';

//          // Prepare statement
        $stmt = $this->conn->prepare($query);

//          // Clean data
        $name = htmlspecialchars(strip_tags($name));
        $email = htmlspecialchars(strip_tags($email));
        $password = htmlspecialchars(strip_tags($password));
        $phone = htmlspecialchars(strip_tags($phone));
        $gender = htmlspecialchars(strip_tags($gender));
        $pic = htmlspecialchars(strip_tags($pic));
        $age = htmlspecialchars(strip_tags($age));
//

//          // Bind data
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':pic', $pic);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':age',date('Y/m/d', strtotime($age)));
        $stmt->bindParam(':gender', $gender);


        $stmt->execute();


        $query2 = 'SELECT LAST_INSERT_ID() as userId;';
        $stmt2 = $this->conn->prepare($query2);
        $stmt2->execute();



        return $stmt2;
    }



}