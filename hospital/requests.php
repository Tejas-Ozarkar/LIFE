<?php
$currentPage = 'dashboard';
    include "../components/header.php";
    include "../config/dbconnect.php"; 
    if ($_SESSION['id']!=null&&$_SESSION['user-type']=="hospital") {
        $user_id = $_SESSION['id'];?>
        
        <div class="dashboard-main row">
        <div class="col-md-3">
                <div class="controls">
                    <a href="./dashboard.php">
                        <div class="control-box">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </div>
                    </a>
                    <a href="./requests.php">
                        <div class="control-box control-active">
                        <i class="fas fa-user-plus"></i>
                            <p>Requests</p>
                        </div>
                    </a>
                    <a href="./edit.php">
                        <div class="control-box">
                        <i class="fas fa-cog"></i>
                            <p>Edit profile</p>
                        </div>
                    </a>
                   
                </div>
            </div>
            <div class="col-md-9">
                <h3 class="header-text">Requests</h3>
                <div class="row">
                    <?php
                    $sql = "SELECT hospital_blood.id as hb_id, requests.id,requests.no_of_samples,receivers.first_name,receivers.last_name,blood_groups.blood_type  
                    FROM requests,receivers,hospital_blood,hospitals,blood_groups 
                    WHERE requests.hospital_blood_id=hospital_blood.id 
                    AND requests.receiver_id=receivers.id
                    AND hospital_blood.blood_id=blood_groups.id
                    AND hospital_blood.hospital_id=$user_id
                    AND hospitals.id=$user_id
                    AND requests.status='pending'";
                    
                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            extract($row); ?>
                            <div class="col-md-3">
                                <div class="request-card">
                                    <h3><?php echo $first_name ?>
                                    <?php echo $last_name ?> </h3>
                                    <div class="request-card-left"><p><?php echo $blood_type ?></p></div>
                                    <div class="request-card-right"><p class="samples">Requested Samples: <?php echo $no_of_samples ?></p></div>
                                    <div class="request-buttons">
                                        <button class="btn-accept" onclick="changeStatus('<?php echo $id ?>','accept','<?php echo $hb_id; ?>','<?php echo $no_of_samples; ?>')">Accept</button>
                                        <button class="btn-reject" onclick="changeStatus('<?php echo $id ?>','reject','<?php echo $hb_id; ?>','<?php echo $no_of_samples; ?>')">Reject</button>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No requests yet";
                    } ?>
                </div>
            </div>
        </div>
        
        <?php include "../components/scripts.php"; ?>
        <script type="text/javascript">
            function changeStatus(id, status,hb_id,req_samples) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo home_base_url(); ?>api/response.php",
                    data: { id: id, status: status, hb_id: hb_id,req_samples: req_samples }
                }).done(function(msg) {
                    // alert("Data Saved" + msg);
                    location.reload();
                });
            }   
        </script>
        <?php
        
    }
    include "../components/footer.php";
?>