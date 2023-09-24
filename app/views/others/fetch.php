


<?php

define('ROOT', "http://localhost/NEUST-PAPAYA/public/");


function get_date($date)
{
	return date("jS M, Y",strtotime($date));
}


$db = new mysqli('localhost', 'root', '', 'neust'); 
  
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
}


if(isset($_POST['page'])){ 
    // Include pagination library file 
    include_once 'Pagination.php'; 

    // Set some useful configuration 
    $baseURL = '../app/views/others/fetch.php'; 
    $offset = !empty($_POST['page'])?$_POST['page']:0; 
    $limit = 2; 
     
    // Set conditions for search 
    $whereSQL = ''; 
    if(!empty($_POST['keywords'])){ 
        $whereSQL = " WHERE ( title LIKE '%".$_POST['keywords']."%' OR description LIKE '%".$_POST['keywords']."%') "; 
    }      
    // Count of all records 
    $query   = $db->query("SELECT COUNT(*) as rowNum FROM news ".$whereSQL); 
    $result  = $query->fetch_assoc(); 
    $rowCount= $result['rowNum']; 
     
    // Initialize pagination class 
    $pagConfig = array( 
        'baseURL' => $baseURL, 
        'totalRows' => $rowCount, 
        'perPage' => $limit, 
        'currentPage' => $offset, 
        'contentDiv' => 'dataContainer', 
        'link_func' => 'searchFilter' 
    ); 
    $pagination =  new Pagination($pagConfig); 


    // Fetch records based on the offset and limit 
    // $query = $db->query("SELECT * FROM users $whereSQL ORDER BY id DESC LIMIT $offset,$limit"); 
    $query = $db->query("SELECT news.*, news_categories.name FROM news join news_categories on news.category_id = news_categories.id WHERE ( name LIKE '%".$_POST['keywords']."%' OR title LIKE '%".$_POST['keywords']."%' OR description LIKE '%".$_POST['keywords']."%') ORDER BY date desc LIMIT $offset,$limit"); 

?> 
    <!-- Data list container --> 
    <div class="row justify-content-center"  id="dataContainer">
    <?php 
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){ 
                $offset++
        ?> 
                <div class="col-md-6 mb-2">
                    <div class="blog-entry" >
                        <a href="<?= ROOT ?>newsDetail/<?= $row['slug'] ?>" class="block-20 d-flex align-items-end" width="200" height="250"
                            style="background-image: url(http://localhost/NEUST-PAPAYA/public/<?=$row['image']?>); object-fit:cover;">
                            <div class="meta-date text-center p-2">
        
                                <span class="text-whote">
                                    <?= get_date($row['date']) ?>
                                </span>
                            </div>
                        </a>
                        <div class="text bg-white p-4" style="height:410px;">
                            <h6 class="heading text-left "><a href="<?= ROOT ?>newsDetail/<?= $row['slug'] ?>"><?= substr($row['title'], 0, 40) ?></a></h6>
                            <p class="text-justify news-body">
                               <?php 
                                            $des = strip_tags($row['description']); 
                                            $des2 = str_replace("&nbsp;", "",$des);
                                            echo substr($des2, 0,150);
                                            
                                            ?>
                            </p>
                            <div class="justify-content-center text-center align-items-center mt-4">
                                <p class="mb-0"><a href="<?= ROOT ?>newsDetail/<?= $row['slug'] ?>" class="btn btn-primary">Read More
                                        <span class="fa-solid fa-arrow-right "></span></a></p>
                                <p class="ml-auto my-2">
                                    <a href="<?= ROOT ?>newsDetail/<?= $row['slug'] ?>" class="mr-2"><?= $row['name'] ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
            } 
        }else{  
            echo '    <center>
            <h1 class="bg-danger p-5 text-white">NO NEWS FOUND IN THIS CATEGORY</h1>
        </center>';
    } 
    ?> 
    
    </div>
      <!-- Display pagination links --> 
        <div class="row justify-content-center">
            <div class="col-12">
                <?php echo $pagination->createLinks(); ?> 
            </div>
        </div>
     
  
 
<?php 
} 

?>






































