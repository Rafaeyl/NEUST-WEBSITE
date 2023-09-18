


<?php


if(count($_POST) > 0)
{
    $text = $_POST['text'];

    $string = "mysql:host=localhost;dbname=neust";
    
    try{
        $con = new PDO($string, "root", "");
    }catch(PDOException $e){
        die($e->getMessage());
    }

    $text = addslashes($text);
    $stm = $con->query("select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id WHERE name OR title OR description LIKE '%$text%'");
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
    }

