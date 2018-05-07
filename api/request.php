<?php
    include "../config/dbconnect.php";
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            extract($_POST);

    
        $sql = "INSERT INTO requests(hospital_blood_id,receiver_id,no_of_samples) VALUES('$blood_id','$receiver_id','$samples')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            echo "Success";
        } else {
            echo "Failed";
        }

        $new_samples = $available_samples-$samples;
        $sql = "UPDATE hospital_blood
        SET samples=$new_samples
        WHERE id=$blood_id";
        $query = mysqli_query($con, $sql);
        if ($query) {
            echo "Updated";
        } else {
            echo "Updation Failed";
        }
    }
