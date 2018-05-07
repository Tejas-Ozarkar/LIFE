<?php
$currentPage = 'dashboard';
 include "../components/header.php";
 include "../config/dbconnect.php"; 
    if ($_SESSION['id']!=null&&$_SESSION['user-type']=="hospital") {
        $user_id = $_SESSION['id'];
        
        $sql = "SELECT * FROM hospitals
        WHERE id=$user_id";
        $query = mysqli_query($con,$sql);
        $result=mysqli_fetch_assoc($query);
        extract($result);
         
        if (isset($_POST['btn-edit-profile'])) {
            extract($_POST);
            
            $sql="UPDATE hospitals 
            SET name='$name',
            address_line_1='$address1',
            address_line_2='$address2',
            city='$city',
            state='$state',
            pincode=$pincode,
            contact_person_name='$contact_person',
            contact_no=$contact_no,
            email='$email'
            WHERE id=$user_id
            ";
            $query=mysqli_query($con, $sql);
            if($query){
                echo "<script>snackbar('Information updated')</script>";
            }
            else{
                echo "<script>snackbar('Updation Failed')</script>";
            }
         }
        
        if (isset($_POST['btn-change-password'])) {
            extract($_POST);
            // print_r($_POST);
            // echo $new_password;
            if($new_password!=$password_again){
                echo "<script>snackbar('Passwords do not match');</script>";
            }else if($old_password!=$password){
                echo "<script>snackbar('Please Enter Valid Current Password');</script>";
            }else{
            $sql="UPDATE hospitals 
            SET password='$new_password'
            WHERE id=$user_id
            ";
            $query=mysqli_query($con, $sql);
            if($query){
                echo "<script>snackbar('Information updated')</script>";
            }
            else{
                echo "<script>snackbar('Updation Failed')</script>";
            }
         }}
        ?>


       
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
                        <div class="control-box">
                        <i class="fas fa-user-plus"></i>
                            <p>Requests</p>
                        </div>
                    </a>
                    <a href="./edit.php">
                        <div class="control-box control-active">
                        <i class="fas fa-cog"></i>
                            <p>Edit profile</p>
                        </div>
                    </a>
                   
                </div>
            </div>
            <div class="col-md-9">
                 <div class="edit-main">
                     <form method="POST">
                     <h3>Edit Profile</h3><hr>
                     <div class="row">
                         <div class="col-md-4"> <h5>Hospital Name:</h5></div>
                         <div class="col-md-8"><input value="<?php echo $name; ?>" name="name" class="form-control" type="text"></div>
                     </div>
                     <div class="row">
                         <div class="col-md-4"> <h5>Address Line 1:</h5></div>
                         <div class="col-md-8"><input value="<?php echo $address_line_1; ?>" name="address1"class="form-control" type="text"></div>
                     </div>
                     <div class="row">
                         <div class="col-md-4"> <h5>Address Line 2:</h5></div>
                         <div class="col-md-8"><input value="<?php echo $address_line_2; ?>" name="address2"class="form-control" type="text"></div>
                     </div>
                     <div class="row">
                         <div class="col-md-4"> <h5>City:</h5></div>
                         <div class="col-md-8"><input value="<?php echo $city; ?>" name="city"class="form-control" type="text"></div>
                     </div>
                     <div class="row">
                         <div class="col-md-4"> <h5>State:</h5></div>
                         <div class="col-md-8"><input value="<?php echo $state; ?>" name="state" class="form-control" type="text"></div>
                     </div>
                     <div class="row">
                         <div class="col-md-4"> <h5>Pincode:</h5></div>
                         <div class="col-md-8"><input  value="<?php echo $pincode; ?>" name="pincode"class="form-control"type="text"></div>
                     </div>
                     <div class="row">
                         <div class="col-md-4"> <h5>Contact Person:</h5></div>
                         <div class="col-md-8"><input value="<?php echo $contact_person_name; ?>" name="contact_person"class="form-control" type="text"></div>
                     </div>
                     <div class="row">
                         <div class="col-md-4"> <h5>Contact Number:</h5></div>
                         <div class="col-md-8"><input value="<?php echo $contact_no; ?>" name="contact_no"class="form-control" type="text"></div>
                     </div>
                     <div class="row">
                         <div class="col-md-4"> <h5>Email:</h5></div>
                         <div class="col-md-8"><input value="<?php echo $email; ?>" name="email"class="form-control" type="text"></div>
                     </div>
                     <button type="submit" name="btn-edit-profile">Edit</button>
                    </form>
                     <h3>Change Password</h3>
                     <hr>
                     <form method="post">
                     <div class="row">
                         <div class="col-md-4"> <h5>New Password:</h5></div>
                         <div class="col-md-8"><input name="new_password" class="form-control" type="password"></div>
                     </div>
                     
                     <div class="row">
                         <div class="col-md-4"> <h5>Type Password Again:</h5></div>
                         <div class="col-md-8"><input name="password_again" class="form-control" type="password"></div>
                     </div>
                     <div class="row">
                         <div class="col-md-4"> <h5>Old Password:</h5></div>
                         <div class="col-md-8"><input name="old_password" class="form-control" type="password"></div>
                     </div>
                     <button type="submit" name="btn-change-password">Change</button>
                   
                     </form>
                 </div>
            </div>
        </div>
        
        <?php include "../components/scripts.php"; ?>
      
        <?php  
    }
    include "../components/footer.php";
?>