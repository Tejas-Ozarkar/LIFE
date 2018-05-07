<?php 
include "../config/dbconnect.php";
if ($_SERVER['REQUEST_METHOD']=='POST') {
    extract($_POST);

 $sql = "UPDATE hospital_blood
 SET samples=$samples
 WHERE id=$id";
 $query = mysqli_query($con, $sql);
 if ($query) {
     echo "Updated";
 } else {
     echo "Updation Failed";
 }
}

?>