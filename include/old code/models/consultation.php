<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/8/2018
 * Time: 10:34 PM
 */

class consultation
{
    // DB stuff
    private $conn;
    // private $table = 'consultation';

    // Post Properties
    public $consultationId;
    public $consultationContent;
    public $pre_illnesses;
    public $answerNumber;
    public $userId;
    public $userName;
    public $adminId;
    public $adminName;
    public $answerId;
    public $answer;
    public $date;
    public $isViewed;


    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }


    // Get Posts
    public function read()
    {
        // Create query

        $query = 'select consultation.id as consultationId, consultation.content as consultationContent, consultation.pre_illnesses,consultation.answers_number as answerNumber,
       user.id as userId , user.name as userName, consultation.date, consultation.isViewed
                                FROM consultation
                                INNER JOIN
                                 user ON consultation.u_id = user.id order by consultation.date desc';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function readUserConsultations($us_id)
    {
        // Create query

        $query = 'select consultation.id as consultationId, consultation.content as consultationContent, consultation.pre_illnesses,consultation.answers_number as answerNumber,
       user.id as userId , user.name as userName, consultation.date, consultation.isViewed
                                FROM consultation
                                INNER JOIN
                                 user ON consultation.u_id = user.id where user.id= '.$us_id.' order by consultation.date desc';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function viewConsultation($co_id,$us_id)
    {
        // Create query


        $query = 'update consultation set isViewed = 1 where id = '.$co_id.' and u_id = '.$us_id;


        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function addConsultation($us_id,$cons,$pre)
    {
        // Create query


        $query = 'INSERT INTO consultation SET content = :cons, u_id = :userId, pre_illnesses = :preIllnesses, date= :date';

        $stmt = $this->conn->prepare($query);

//          // Clean data
        $cons = htmlspecialchars(strip_tags($cons));
        $userId = htmlspecialchars(strip_tags($us_id));
        $pre = htmlspecialchars(strip_tags($pre));


//          // Bind data
        $stmt->bindParam(':cons', $cons);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':preIllnesses', $pre);
        $date=date('Y/m/d', time());
        $stmt->bindParam(':date',$date );

        $stmt->execute();

        $query1 = 'SELECT LAST_INSERT_ID() as consultationId;';
        $stmt1 = $this->conn->prepare($query1);
        $stmt1->execute();


        return $stmt1;
    }

    public function deleteConsultation($co_id)
    {
        // Create query

        $query0 = 'delete from answer where consultation_id = '.$co_id;
        $stmt0 = $this->conn->prepare($query0);

        // Execute query
        $stmt0->execute();

        $query = 'delete from consultation where id = '.$co_id;


        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function readUnanswered($ad_id)
    {
        // Create query


$query='SELECT 
    *
FROM
    (SELECT 
        c.*, u.name
    FROM
        answer a
    RIGHT JOIN consultation c ON a.consultation_id = c.id
    INNER JOIN user u ON u.id = c.u_id) t
WHERE
    t.id NOT IN (SELECT 
            consultation_id
        FROM
            answer
        WHERE
            admin_id = '.$ad_id.' ) ORDER BY t.answers_number ASC, t.date ASC ';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function readAnswered($ad_id)
    {
        // Create query


        $query = 'select answer.consultation_id as consultationId,  consultation.content as consultationContent, consultation.pre_illnesses, user.id as userId, user.name as userName, admin.id as adminId, admin.name as adminName,answer.id as answerId, answer.content as answer, answers_number as answersNumber from answer inner join admin on answer.admin_id= admin.id inner join consultation on answer.consultation_id = consultation.id inner join user on consultation.u_id = user.id where admin.id = ' . $ad_id .' order by consultation.answers_number asc';


        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }


    public function readAnswers($co_id)
    {
        // Create query

        $query = 'select answer.id as answerId, answer.content as answer, admin.id as adminId, admin.name as adminName from answer inner join admin on answer.admin_id = admin.id where answer.consultation_id = ' . $co_id;


        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function editAnswer($an_id,$answer)
    {
        // Create query

        $query = "update answer set content = '".$answer."'"." where id= ".$an_id;


        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

       // return $stmt;
    }

    public function deleteAnswer($an_id)
    {
        // Create query

        $query = 'delete from answer where id= '.$an_id;


        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function addAnswer($ans, $ad_id, $cons_id)
    {
        // Create query
        $query0= 'update consultation set isViewed = 0 where id= '.$cons_id;
        $stmt0 = $this->conn->prepare($query0);
        $stmt0->execute();

        $query = 'INSERT INTO answer SET consultation_id = :cons, admin_id = :ad_id, content = :ans';

//          // Prepare statement
        $stmt = $this->conn->prepare($query);

//          // Clean data
        $cons_id = htmlspecialchars(strip_tags($cons_id));
        $ad_id = htmlspecialchars(strip_tags($ad_id));
        $ans = htmlspecialchars(strip_tags($ans));

//          // Bind data
        $stmt->bindParam(':cons', $cons_id);
        $stmt->bindParam(':ad_id', $ad_id);
        $stmt->bindParam(':ans', $ans);

        $stmt->execute();

        $query1 = 'UPDATE consultation SET answers_number =  Coalesce(answers_number, 0) + 1 where consultation.id = '.$cons_id;
        $stmt1 = $this->conn->prepare($query1);
        $stmt1->execute();

        $query2 = 'SELECT LAST_INSERT_ID() as answer_id;';
        $stmt2 = $this->conn->prepare($query2);
        $stmt2->execute();


        /*
      INSERT INTO tbl(description)
      VALUES('MySQL last_insert_id');*/
        /*
      SELECT LAST_INSERT_ID();*/

        // Prepare statement
//        $stmt = $this->conn->prepare($query);
//        $stmt2 = $this->conn->prepare($query2);

        // Execute query

//        $stmt2->execute();

        return $stmt2;
    }


//      // Get Single Post
//      public function read_single() {
//          // Create query
//          $query = 'SELECT c.name as category_name, p.id, p.category_id, p.title, p.body, p.author, p.created_at
//                                    FROM ' . $this->table . ' p
//                                    LEFT JOIN
//                                      categories c ON p.category_id = c.id
//                                    WHERE
//                                      p.id = ?
//                                    LIMIT 0,1';
//
//          // Prepare statement
//          $stmt = $this->conn->prepare($query);
//
//          // Bind ID
//          $stmt->bindParam(1, $this->id);
//
//          // Execute query
//          $stmt->execute();
//
//          $row = $stmt->fetch(PDO::FETCH_ASSOC);
//
//          // Set properties
//          $this->title = $row['title'];
//          $this->body = $row['body'];
//          $this->author = $row['author'];
//          $this->category_id = $row['category_id'];
//          $this->category_name = $row['category_name'];
//      }
//
//      // Create Post
//      public function create() {
//          // Create query
//          $query = 'INSERT INTO ' . $this->table . ' SET title = :title, body = :body, author = :author, category_id = :category_id';
//
//          // Prepare statement
//          $stmt = $this->conn->prepare($query);
//
//          // Clean data
//          $this->title = htmlspecialchars(strip_tags($this->title));
//          $this->body = htmlspecialchars(strip_tags($this->body));
//          $this->author = htmlspecialchars(strip_tags($this->author));
//          $this->category_id = htmlspecialchars(strip_tags($this->category_id));
//
//          // Bind data
//          $stmt->bindParam(':title', $this->title);
//          $stmt->bindParam(':body', $this->body);
//          $stmt->bindParam(':author', $this->author);
//          $stmt->bindParam(':category_id', $this->category_id);
//
//          // Execute query
//          if($stmt->execute()) {
//              return true;
//          }
//
//          // Print error if something goes wrong
//          printf("Error: %s.\n", $stmt->error);
//
//          return false;
//      }
//
//      // Update Post
//      public function update() {
//          // Create query
//          $query = 'UPDATE ' . $this->table . '
//                                SET title = :title, body = :body, author = :author, category_id = :category_id
//                                WHERE id = :id';
//
//          // Prepare statement
//          $stmt = $this->conn->prepare($query);
//
//          // Clean data
//          $this->title = htmlspecialchars(strip_tags($this->title));
//          $this->body = htmlspecialchars(strip_tags($this->body));
//          $this->author = htmlspecialchars(strip_tags($this->author));
//          $this->category_id = htmlspecialchars(strip_tags($this->category_id));
//          $this->id = htmlspecialchars(strip_tags($this->id));
//
//          // Bind data
//          $stmt->bindParam(':title', $this->title);
//          $stmt->bindParam(':body', $this->body);
//          $stmt->bindParam(':author', $this->author);
//          $stmt->bindParam(':category_id', $this->category_id);
//          $stmt->bindParam(':id', $this->id);
//
//          // Execute query
//          if($stmt->execute()) {
//              return true;
//          }
//
//          // Print error if something goes wrong
//          printf("Error: %s.\n", $stmt->error);
//
//          return false;
//      }
//
//      // Delete Post
//      public function delete() {
//          // Create query
//          $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
//
//          // Prepare statement
//          $stmt = $this->conn->prepare($query);
//
//          // Clean data
//          $this->id = htmlspecialchars(strip_tags($this->id));
//
//          // Bind data
//          $stmt->bindParam(':id', $this->id);
//
//          // Execute query
//          if($stmt->execute()) {
//              return true;
//          }
//
//          // Print error if something goes wrong
//          printf("Error: %s.\n", $stmt->error);
//
//          return false;
//      }

}