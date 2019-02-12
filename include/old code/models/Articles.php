<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/8/2018
 * Time: 10:34 PM
 */

class Articles
{
    // DB stuff
    private $conn;
    // private $table = 'consultation';

    // Post Properties
    public $articleId;
    public $adminId;
    public $adminName;
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

    public function readAdminArticles($ad_id)
    {

            $query =
                'select article.id as articleId, article.content, article.subject,
 article.headline, article.views,
 article.date, article.pic, admin.id as adminId, admin.name as adminName from article inner join admin on article.a_id = admin.id where article.a_id= '.$ad_id.' order by article.date desc;
' ;





        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }
    // Get Posts
    public function read()
    {
        // Create query

        $query = 'select article.id, as articleId , article.content, article.subject, article.headline ,article.views , article.date, article.pic, admin.id as adminId, admin.name as adminName from article inner join admin on article.a_id = admin.id; ';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function readMostViewedArticles($n)
    {
        // Create query

if($n==3)
{
    $query =
        'select article.id as articleId, article.content, article.subject,
 article.headline, article.views,
 article.date, article.pic, admin.id as adminId, admin.name as adminName from article inner join admin on article.a_id = admin.id order by article.views desc Limit 3;
' ;
}
else
{
    $query =
        'select article.id as articleId, article.content, article.subject,
 article.headline, article.views,
 article.date, article.pic, admin.id as adminId, admin.name as adminName from article inner join admin on article.a_id = admin.id order by article.views desc;
' ;
}


        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function readLatestArticles($n)
    {
        // Create query
if($n==3)
{
    $query =
        'select article.id as articleId, article.content, article.subject,
 article.headline, article.views,
 article.date, article.pic, admin.id as adminId, admin.name as adminName from article inner join admin on article.a_id = admin.id order by article.date desc limit 3;
' ;
}
else
{
    $query =
        'select article.id as articleId, article.content, article.subject,
 article.headline, article.views,
 article.date, article.pic, admin.id as adminId, admin.name as adminName from article inner join admin on article.a_id = admin.id order by article.date desc;
' ;
}




        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function editArticle($ar_id,$article,$subject,$ad_id)
    {
        // Create query

        $query = "update article set content = '".$article."'". ", subject= '".$subject."'"." where id= ".$ar_id ." and a_id= ".$ad_id;

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        // return $stmt;
    }

    public function deleteArticle($ar_id,$ad_id)
    {
        // Create query

        $query0 = 'delete from archived where a_id = '.$ar_id;

        $stmt0 = $this->conn->prepare($query0);

        // Execute query
        $stmt0->execute();

        $query = 'delete from article where id= '.$ar_id." and a_id= ".$ad_id;


        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function readArticle($ar_id)
    {
        // Create query

        $query = 'select article.id as articleId , article.content, article.subject, article.headline ,article.views , article.date, article.pic, admin.id as adminId, admin.name as adminName from article inner join admin on article.a_id = admin.id where article.id = '.$ar_id;


        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function addArticle($article,$headline,$subject,$pic,$ad_id)
    {
        // Create query

        $query = 'INSERT INTO article SET content = :content, subject = :subject, headline = :headline, pic = :pic, date = :date, a_id= :adminId';

//          // Prepare statement
        $stmt = $this->conn->prepare($query);

//          // Clean data
        $article = htmlspecialchars(strip_tags($article));
        $subject = htmlspecialchars(strip_tags($subject));
        $headline = htmlspecialchars(strip_tags($headline));
        $pic = htmlspecialchars(strip_tags($pic));
        $adminId = htmlspecialchars(strip_tags($ad_id));
//

//          // Bind data
        $stmt->bindParam(':content', $article);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':headline', $headline);
        $stmt->bindParam(':pic', $pic);
        $stmt->bindParam(':adminId', $adminId);
        $date=date('Y/m/d', time());
        $stmt->bindParam(':date', $date);


        $stmt->execute();


        $query2 = 'SELECT LAST_INSERT_ID() as articleId;';
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

    public function incrementViews($ar_id)
    {
        // Create query

        $query = 'UPDATE article SET views =  Coalesce(views, 0) + 1 where id = '.$ar_id;

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function readArchivedArticles($us_id)
    {
        // Create query

        $query = 'select archived.a_id as articleId, article.content, article.subject,
 article.headline, article.views,
 article.date, article.pic, admin.id as adminId, admin.name as adminName from archived inner join article  on archived.a_id = article.id inner join admin on article.a_id = admin.id where archived.u_id= '.$us_id;

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function archiveArticle($ar_id,$us_id)
    {
        // Create query

        $query0='select isArchived from archived where a_id= '.$ar_id.' and u_id = '.$us_id;
        $stmt0 = $this->conn->prepare($query0);
        $stmt0->execute();
        $row = $stmt0->fetch(PDO::FETCH_ASSOC);
//
//            extract($row);
//
//            $post_item = array(
//                'articleId' => $articleId,
//                'adminId' => $adminId,
//                'adminName' => $adminName,
//                'content' => $content,
//                'subject' => $subject,
//                'headline' => $headline,
//                'views' => $views,
//                'date' => $date,
//                'pic' => $pic,
//            );
        if(isset($row['isArchived']) && $row['isArchived'] ==0)
        {

            $query = 'update archived set isArchived = 1 where u_id = '.$us_id.' and a_id = '.$ar_id;

            // Prepare statement
            $stmt = $this->conn->prepare($query);


            $stmt->execute();


            return $stmt;
        }
        else if (isset($row['isArchived']) && $row['isArchived'] ==1)
        {
            $query = 'update archived set isArchived = 0 where u_id = '.$us_id.' and a_id = '.$ar_id;

            // Prepare statement
            $stmt = $this->conn->prepare($query);


            $stmt->execute();


            return $stmt;
        }
        else
        {

            $query = 'INSERT INTO archived SET u_id = :userId, a_id = :articleId, isArchived = 1 ';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            $userId = htmlspecialchars(strip_tags($us_id));
            $articleId = htmlspecialchars(strip_tags($ar_id));

            // Bind data
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':articleId', $articleId);

            $stmt->execute();


            return $stmt;
        }





    }



}