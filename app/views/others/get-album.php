<?php  
$db = new mysqli('localhost', 'root', '', 'neust'); 
  
// echo 'tae';
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
}
$sql = $db->query('SELECT album.album_name, album.image, album.date_created, gallery.* FROM gallery INNER JOIN album ON gallery.album_id = album.id');

$result = $sql->fetch_assoc();

$res = ['status' => 'ok', 'data' => $result];

 echo json_encode($res)

?>