<?php 
include "../config/dbconnect.php";
if ($_SERVER['REQUEST_METHOD']=='POST') {
    extract($_POST);

 $sql = "DELETE FROM requests
 WHERE id=$id";
 $query = mysqli_query($con, $sql);
 if ($query) {
     echo "Deleted";
 } else {
     echo "Deletion Failed";
 }
}

?>