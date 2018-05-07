<?php 
    $currentPage = 'availability';
    include "./header.php";
    include "./config/dbconnect.php";
    $user_id = $_SESSION['id'];
    $user_type = $_SESSION['user-type'];

            $sql = "SELECT DISTINCT city  
            FROM hospitals";
            $cities = mysqli_query($con, $sql);
           //$cities = mysqli_fetch_assoc($result);
            //print_r($cities);
    
            $sql = "SELECT blood_group  
            FROM receivers 
            WHERE id=$user_id";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            // echo($row['blood_group']);
            $user_blood_group = $row['blood_group'];

            $sql = "SELECT h.*,hb.id as blood_id,blood_type,samples 
            FROM hospitals as h,blood_groups as bg,hospital_blood as hb 
            WHERE h.id=hb.hospital_id 
            AND bg.id=hb.blood_id
            AND samples>0";

        $result = mysqli_query($con, $sql); ?>

    <div class="availability-main row">
        <div class="col-md-3 filter-main">
            <div class="filter-box">
                <div class="filter-header">
                <h4>Filters<span>
                <i class="fas fa-sliders-h"></i></span></h4>
                </div>
               
                <div class="filter-body">
                <form method="get">
                   <p>Search by hospital</p>
                <input type="text" class="filter-search form-control" name="search" placehoder="Search...">
                <p>Blood Group</p>
                <select name="blood_group" class="filter-blood-group form-control">
                    <option value="" selected disabled>Select Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="AB+">AB+</option>
                    <option value="O+">O+</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="AB-">AB-</option>
                    <option value="O-">O-</option>
                </select>
                <p>City</p>
                <select name="city" class="filter-city form-control">
                    <option value="" selected disabled>Select City</option>
                    <?php if (mysqli_num_rows($result) > 0) {
                             while ($row = mysqli_fetch_assoc($cities)) {?>
                            <option value="<?php echo $row['city'];?>"><?php echo $row['city']; ?></option>
                        <?php
                             }
                         } ?>     
                </select>
                <button name="btnFilter" class="filter-button" type="submit">Filter</button> 
                </div>    
            </div>
        </div>
        <?php   if (isset($_GET['btnFilter'])) {
                $query=$_GET['search'];
                $blood_group=$_GET['blood_group'];
                $city = $_GET['city'];
                // echo $city;
                // echo $blood_group;
                if ($blood_group!=""&&$city!=""&&$query!="") {
                    $sql="SELECT h.*,hb.id as blood_id,blood_type,samples 
                    FROM hospitals as h,blood_groups as bg,hospital_blood as hb 
                    WHERE h.id=hb.hospital_id 
                    AND bg.id=hb.blood_id
                    AND h.name like '%".$query."%'
                    AND bg.blood_type = '$blood_group'
                    AND h.city = '$city'
                    AND samples>0";
                    $result = mysqli_query($con, $sql) or die(mysql_error());
                   
                }else if($blood_group!=""&&$city!=""){
                    $sql="SELECT h.*,hb.id as blood_id,blood_type,samples 
                    FROM hospitals as h,blood_groups as bg,hospital_blood as hb 
                    WHERE h.id=hb.hospital_id 
                    AND bg.id=hb.blood_id
                    AND bg.blood_type = '$blood_group'
                    AND h.city = '$city'
                    AND samples>0";
                    $result = mysqli_query($con, $sql) or die(mysql_error());
                }
                else if($blood_group!=""&&$query!=""){
                    $sql="SELECT h.*,hb.id as blood_id,blood_type,samples 
                    FROM hospitals as h,blood_groups as bg,hospital_blood as hb 
                    WHERE h.id=hb.hospital_id 
                    AND bg.id=hb.blood_id
                    AND bg.blood_type = '$blood_group'
                    AND h.name like '%".$query."%'
                    AND samples>0";
                    $result = mysqli_query($con, $sql) or die(mysql_error());
                }else if ($city!=""&&$city!=""&&$query!="") {
                    $sql="SELECT h.*,hb.id as blood_id,blood_type,samples 
                    FROM hospitals as h,blood_groups as bg,hospital_blood as hb 
                    WHERE h.id=hb.hospital_id 
                    AND bg.id=hb.blood_id
                    AND h.name like '%".$query."%'
                    AND h.city = '$city'
                    AND samples>0";
                    $result = mysqli_query($con, $sql) or die(mysql_error());       
                }else if ($blood_group!="") {
                    $sql="SELECT h.*,hb.id as blood_id,blood_type,samples 
                    FROM hospitals as h,blood_groups as bg,hospital_blood as hb 
                    WHERE h.id=hb.hospital_id 
                    AND bg.id=hb.blood_id
                    AND bg.blood_type = '$blood_group'
                    AND samples>0";
                    $result = mysqli_query($con, $sql) or die(mysql_error());       
                }
                else if ($city!="") {
                    $sql="SELECT h.*,hb.id as blood_id,blood_type,samples 
                    FROM hospitals as h,blood_groups as bg,hospital_blood as hb 
                    WHERE h.id=hb.hospital_id 
                    AND bg.id=hb.blood_id
                    AND h.city = '$city'
                    AND samples>0";
                    $result = mysqli_query($con, $sql) or die(mysql_error());       
                }
                else{
                    $sql="SELECT h.*,hb.id as blood_id,blood_type,samples 
                    FROM hospitals as h,blood_groups as bg,hospital_blood as hb 
                    WHERE h.id=hb.hospital_id 
                    AND bg.id=hb.blood_id
                    AND h.name like '%".$query."%'
                    AND samples>0";
                    $result = mysqli_query($con, $sql) or die(mysql_error());
                  
                }
             } 

        if (mysqli_num_rows($result) > 0) {
            
            // output data of each row?>
        <div class="list col-md-9 row">
        <?php while ($row = mysqli_fetch_assoc($result)) {
          
                extract($row); ?>
           
            <div class="col-md-6">
                <div class="list-card">
                    <div class="hospital-detail">
                        <h3><?php echo $name ?></h3>
                        <h4>Location: <?php echo "$city, $state"; ?> </h4>
                        <h5>Samples Available: <?php echo $samples; ?> </h5>
                    </div>
                    <div class="blood-detail">
                        <i class="fas fa-tint"></i>
                        <h3><?php echo $blood_type; ?></h3>
                    </div>
                    <div class="request-box">
                         <?php if ($user_id==null||$user_type!='receiver') {
                    ?>
                            <a style="width:100%;height:100%;background:#333">Login as Receiver to Request for Samples</a>
                              <?php
                } else {
                    ?>
                                <input type="text" placeholder="Enter no of samples" id="sample<?php echo $blood_id; ?>" <?php if ($user_id==null||$user_type!='receiver') {
                        echo "disabled";
                    } ?>>
                       
                                <a onclick="request(<?php echo $blood_id; ?>, <?php echo $user_id; ?>, <?php echo $samples; ?>, '<?php echo $user_blood_group; ?>', '<?php echo $blood_type; ?>')" >Request Samples</a>
                              <?php
                } ?>
                    </div>
                </div>
            </div>
        <?php
            } ?>
        </div>


    <?php
        } else {
            echo "<script>snackbar('No results')</script>";
        }
    
    ?>


<!-- Footer -->
 <?php include "./scripts.php"; ?>
 <script type="text/javascript">
    
    function request(blood_id, user_id,samples,user_blood_group,blood_group) {
        var req_samples = document.getElementById('sample' + blood_id).value;
        console.log(req_samples);
        if(user_blood_group!=blood_group){
            snackbar("Please request same blood group as yours");
      
        }else if(req_samples>samples){
            snackbar("Please provide available no of samples");
        }else   if(req_samples==""){
            snackbar("Please provide no of samples");
        }else{
            $.ajax({
                type: "POST",
                url: "../api/request.php",
                data: { blood_id: blood_id, receiver_id: user_id, samples: req_samples, available_samples: samples }
            }).done(function(msg) {
                // alert("Data Saved" + msg);
                location.reload();
            });
            
        }
    }
</script>
 <?php 
 include "./components/footer.php"; ?>