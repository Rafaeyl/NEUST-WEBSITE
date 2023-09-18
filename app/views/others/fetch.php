


<?php

define('ROOT', "http://localhost/NEUST-PAPAYA/public/");
function get_img($filename = '')
{

	if(file_exists($filename))
		return "http://localhost/NEUST-PAPAYA/public/uploads".$filename;

	return "http://localhost/NEUST-PAPAYA/public/" . '/assets/images/noimage.png';
}

function get_date($date)
{
	return date("jS M, Y",strtotime($date));
}


$conn = mysqli_connect("localhost","root","","neust");
  
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


$search = $_POST['name'];

$sql = "select news.*, news_categories.name from news join news_categories on news.category_id = news_categories.id WHERE name LIKE '%$search%' OR  title LIKE '%$search%'";  
$query = mysqli_query($conn,$sql);
$data='';

while( $row = mysqli_fetch_assoc($query))
{
 
    $data .= '
    <div class="col-md-3 mb-2">
    <div class="blog-entry" >
        <a href="http://localhost/NEUST-PAPAYA/public/newsDetail/'. $row["slug"] .'" class="block-20 d-flex align-items-end" width="200" height="250"
            style="background-image: url(../../NEUST-PAPAYA/public/' . $row["image"] .'); object-fit:cover;">
            <div class="meta-date text-center p-2">

                <span class="text-whote">' .get_date($row["date"]) .' 
                </span>
            </div>
        </a>
        <div class="text bg-white p-4" style="height:410px;">
            <h6 class="heading text-left "><a href="' . ROOT .'newsDetail/'. $row["slug"] .'">'. substr($row['title'], 0, 40). '</a></h6>
            <p class="text-justify news-body">' . substr($row['description'], 0, 120) .'</p>
            <div class="justify-content-center text-center align-items-center mt-4">
                <p class="mb-0"><a href="'. ROOT .'newsDetail/'. $row['slug'] .'" class="btn btn-primary">Read More
                        <span class="fa-solid fa-arrow-right "></span></a></p>
                <p class="ml-auto my-2">
                    <a href="'. ROOT .'newsDetail/'.$row['slug'] .'" class="mr-2">' . $row['name'] .'</a>
                </p>
            </div>
        </div>
        </div>
    </div>
    ';
}

if(empty($data)){
    echo ' <h1 class="bg-danger p-5 text-white">NO NEWS FOUND</h1>';
}else{
    echo $data;
}






