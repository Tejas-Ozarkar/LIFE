<?php
$currentPage = 'dashboard';

 include "../components/header.php";
 include "../config/dbconnect.php";
    if ($_SESSION['id']!=null&&$_SESSION['user-type']=="receiver") {
        $user_id = $_SESSION['id'];
     ?>
        <div class="dashboard-main row">
            <div class="col-md-3">
                <div class="controls-receiver ">
                    <a href="./dashboard.php">
                        <div class="control-box control-active">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </div>
                    </a>
                   
                    <a href="./edit.php">
                        <div class="control-box ">
                        <i class="fas fa-cog"></i>
                            <p>Edit profile</p>
                        </div>
                    </a>
                   
                </div>
            </div>
            <div class="col-md-9">
            <div class="dashboard-content">    
                <h3 class="header-text1"> Requested Samples </h3>
                <div class="row blood-availability">
                
                    <?php
                    $sql = "SELECT requests.*,hospitals.name
                    From requests,hospitals,hospital_blood
                    WHERE requests.receiver_id=$user_id
                    AND requests.hospital_blood_id=hospital_blood.id
                    AND hospital_blood.hospital_id=hospitals.id
                    ORDER BY created_at desc";

                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            extract($row); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6" style="margin-bottom: 20px;">
                            <div class="receiver-request-card">
                               <p> Hospital: <span><?php echo $name; ?></span></p>
                               <p>Requested Samples: <span><?php echo $no_of_samples ?> </span></p>
                               <p>Date: <span>
                                    <?php $date = new DateTime($created_at);
                                        echo $date->format('j, F Y');?></span></p>
                               <p>Status: 
                                   <?php 
                                        if ($status=='accept') {
                                            echo "<span style='color:rgb(66, 236, 60)'>Accepted</span>";
                                        }
                                        else if ($status=='reject') {
                                            echo "<span style='color:rgb(236, 60, 60)'>Rejected</span>";
                                        }
                                        else {
                                            echo "<span style='color:rgb(60, 116, 236)'>Pending</span>";
                                        }
                                   ?></p>
                               <button class="btn-delete-request" onclick="deleteRequest(<?php echo $id; ?>)"><i class="fas fa-times"></i></button>                    
                            </div>    
                        </div>
                        
                         <?php 
                        }
                    } else {
                        echo "You have not made any requests yet.";
                    } ?>
                
                </div>
           
            </div>
        </div>
        </div>
        

        <?php include "../components/scripts.php"; ?>
        <script type="text/javascript">
            function deleteRequest(id) {
                // alert(id);
                $.ajax({
                    type: "POST",
                    url: "<?php echo home_base_url(); ?>api/delete-receiver-request.php",
                    data: { id: id }
                }).done(function(msg) {
                    // alert("Data Saved" + msg);
                    location.reload();
                });
            }   
        </script>
        <?php
        include "../components/footer.php";
    }
?>