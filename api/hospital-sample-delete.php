<?php 
include "../config/dbconnect.php";
if ($_SERVER['REQUEST_METHOD']=='POST') {
    extract($_POST);

 $sql = "DELETE FROM hospital_blood
 WHERE id=$id";
 $query = mysqli_query($con, $sql);
 if ($query) {
     echo "Updated";
 } else {
     echo "Updation Failed";
 }
}

?>