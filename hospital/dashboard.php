<?php
$currentPage = 'dashboard';

 include "../components/header.php";
 include "../config/dbconnect.php";
    if ($_SESSION['id']!=null&&$_SESSION['user-type']=="hospital") {
        $user_id = $_SESSION['id'];
        if (isset($_POST['btnAdd'])) {
            extract($_POST);
            if (($samples!="")&&($blood_group!="")) {
                $sql="SELECT * FROM hospital_blood
            where hospital_id = $user_id
            AND blood_id=$blood_group";
                $query=mysqli_query($con, $sql);
                if (mysqli_num_rows($query)>0) {
                    $row=mysqli_fetch_assoc($query);
                    $total_samples=$samples + $row['samples'];
                    echo $total_samples;
                    $sql = "UPDATE hospital_blood
                SET samples = $total_samples
                WHERE id=$row[id]";
                    $query=mysqli_query($con, $sql);
                    if (!$query) {
                        echo "Failed";
                    }
                } else {
                    $sql = "INSERT INTO hospital_blood(hospital_id,blood_id,samples) 
                VALUES ('$user_id','$blood_group','$samples')";
                    $query=mysqli_query($con, $sql);
                    if ($query) {
                        echo "Success";
                    } else {
                        echo "failed";
                    }
                }
                header('Location: dashboard.php');
            }else{
                echo "<script>snackbar('Please fill details')</script>";
            }
         
          
        }
        $sql = "SELECT id, blood_type FROM blood_groups";
        $result = mysqli_query($con, $sql); ?>
        <div class="dashboard-main row">
            <div class="col-md-3">
                <div class="controls">
                    <a href="./dashboard.php">
                        <div class="control-box control-active">
                            <i class="fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </div>
                    </a>
                    <a href="./requests.php">
                        <div class="control-box">
                        <i class="fas fa-user-plus"></i>
                            <p>Requests</p>
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
                <h3 class="header-text1"> Add Blood Group Samples </h3>
                <form method="post">
                    <select name="blood_group">
                        <option disabled selected>select blood group </option>
                        <?php if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['blood_type']; ?> </option>
                            
                        <?php
                            }
                        } else {
                            echo "0 results";
                        } ?>
                    </select>
                    <input type="text" placeholder="Samples" name="samples">
                    <button  type="submit" name="btnAdd">Add</button>
                </form>
                <h3 class="header-text2"> Available Samples </h3>
                <div class="row blood-availability">
                
                    <?php
                    $sql = "SELECT hospital_blood.id,blood_type,samples 
                    From hospitals,hospital_blood,blood_groups
                    WHERE hospital_blood.hospital_id=hospitals.id
                    AND hospital_blood.blood_id=blood_groups.id
                    AND hospitals.id=$user_id";

                    $result = mysqli_query($con, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            extract($row); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card-availability">
                                <div class="card-blood-group">
                                    Blood Group:    <?php echo $blood_type; ?>
                                </div>
                                <input type="text" id="sample<?php echo $id; ?>" class="form-group" value="<?php echo $samples ?>">
                                <div class="card-buttons">
                                    <button class="btn-update" name="btnUpdate" onclick="onUpdate(<?php echo $id; ?>)">Update</button>
                                    <button class="btn-delete" name="btnDelete" onclick="onDelete(<?php echo $id; ?>)">Delete</button>
                                </div>                       
                            </div>    
                        </div>
                        
                         <?php 
                        }
                    } else {
                        echo "0 results";
                    } ?>
                
                </div>
           
            </div>
        </div>
        </div>
        

        <?php include "../components/scripts.php"; ?>
        <script type="text/javascript">
            function onUpdate(id){
                var req_samples = document.getElementById('sample' + id).value;
                $.ajax({
                type: "POST",
                url: "<?php echo home_base_url(); ?>api/hospital-sample-update.php",
                data: {id: id, samples: req_samples }
                }).done(function(msg) {
                    // snackbar('Sample Updated');
                    location.reload();
                });
            }
            function onDelete(id){
                $.ajax({
                type: "POST",
                url: "<?php echo home_base_url(); ?>api/hospital-sample-delete.php",
                data: {id: id }
                }).done(function(msg) {
                    // snackbar('Sample Deleted');
                    location.reload();
                });
            }
        </script>
        <?php
        include "../components/footer.php";
    }
?>