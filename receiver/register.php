<?php 
$currentPage="regReceiver";
include "../components/header.php"; ?>
<?php include "../config/dbconnect.php";
    if (isset($_POST['btnSubmit'])) {
        extract($_POST);
        if ($fname==""||$lname==""||$address1==""||$city==""||$state==""
        ||$pincode==""||$contact==""||$password==""||
        $gender==""||$blood_group=="") {
            echo "<script>snackbar('Please fill in necessary details')</script>";
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script>snackbar('Invalid Email')</script>";
        }
        else if($password!=$password_again){
            echo "<script>snackbar('Passwords do not match')</script>";
        }
       else{
        $query=mysqli_query($con, "INSERT INTO receivers(first_name,last_name,address_line_1,address_line_2,city,state,pincode,contact_no,email,password,gender,blood_group) VALUES('$fname','$lname','$address1','$address2','$city','$state','$pincode','$contact','$email','$password','$gender','$blood_group')");
        if ($query) {
            header("location: ../index.php");
        } else {
            echo "failed";
        }
       }
    }
    
?>
<div class="registration-background">
    <div class="registration-content receiverRegBackground">
        <div class="registration-box">
            <div class="registration-header header-receiver"><h4>Receiver Registration</h4></div>
            <form class="form receiverForm" action="" method="post">
                <div class="divName">
                    <input value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>" style="border-right:0.75px solid rgb(201, 92, 28)" class="form-control" type="text" name="fname" placeholder="First Name">
                    <input value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>"style="border-left: 0.75px solid rgb(201, 92, 28)" class="form-control" type="text" name="lname" placeholder="Last Name">
                </div>
                <input value="<?php echo isset($_POST['address1']) ? $_POST['address1'] : '' ?>"class="form-control" type="text" name="address1" placeholder="Address Line 1">
                <input value="<?php echo isset($_POST['address2']) ? $_POST['address2'] : '' ?>"class="form-control" type="text" name="address2" placeholder="Address Line 2">
                <input value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>"class="form-control" type="text" name="city" placeholder="City">     
                <input value="<?php echo isset($_POST['state']) ? $_POST['state'] : '' ?>"class="form-control" type="text" name="state" placeholder="State">     
                <input value="<?php echo isset($_POST['pincode']) ? $_POST['pincode'] : '' ?>"class="form-control" type="text" name="pincode" placeholder="Pincode">     
                <input value="<?php echo isset($_POST['contact']) ? $_POST['contact'] : '' ?>"class="form-control" type="text" name="contact" placeholder="Contact">     
                <input value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"class="form-control" type="text" name="email" placeholder="Email">     
                <input class="form-control" type="password" name="password" placeholder="Password">     
                <input class="form-control" type="password" name="password_again" placeholder="Type Password Again">     
                <div class="radio-gender">
                    Gender
                    <input type="radio" name="gender" value="male" checked> Male
                    <input type="radio" name="gender" value="female"> Female
                </div>
                <select name="blood_group" style="border-bottom: 1.5px solid rgb(201, 92, 28)">
                    <option value="" disabled selected>Select Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="AB+">AB+</option>
                    <option value="O+">O+</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="AB-">AB-</option>
                    <option value="O-">O-</option>
                </select>
                <!-- <input style="border-bottom: 1.5px solid rgb(201, 92, 28)"class="form-control" type="text" name="blood_group" placeholder="Blood Group">      -->
                <button type="submit" class="btn btn-primary" name="btnSubmit">Register</button> 
            </form>
        </div>
    </div>
</div>
<?php 
include "../components/scripts.php";
include "../components/footer.php"; ?>