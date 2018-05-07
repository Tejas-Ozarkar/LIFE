<?php
    include "../config/dbconnect.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        extract($_POST);
        $sql = "UPDATE requests
        SET status='$status'
        WHERE id=$id";
        $query = mysqli_query($con,$sql);
        if($query){
            echo "Success";
        }
        else echo "Failed";

        $sql = "SELECT samples FROM hospital_blood
        WHERE id=$hb_id";
        $query = mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($query);
        if($query){
            if($status='reject'){
                $new_samples = $row['samples']+$req_samples;
                echo($new_samples);
                $sql = "UPDATE hospital_blood
                SET samples=$new_samples
                WHERE id=$hb_id";
                $query = mysqli_query($con,$sql);
                if($query){
                    echo "Success";
                }
                else echo "Failed";
            }
        }
        else echo "Failed"; 
    }
?>