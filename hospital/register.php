<?php 
$currentPage="regHospital";
include "../components/header.php"; ?>
<?php include "../config/dbconnect.php";
    if (isset($_POST['btnSubmit'])) {
        extract($_POST);
        if($name==""||$address1==""||$city==""||$state==""||$pincode==""||$contact_no==""||$contact_person==""||$password==""){
            echo "<script>snackbar('Please fill in necessary details')</script>";
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script>snackbar('Invalid Email')</script>";
        } else if($password!=$password_again){
            echo "<script>snackbar('Passwords do not match')</script>";
        }
       else{
        $query=mysqli_query($con, "INSERT INTO hospitals(name,address_line_1,address_line_2,city,state,pincode,contact_person_name,contact_no,email,password) VALUES('$name','$address1','$address2','$city','$state','$pincode','$contact_no','$contact_person','$email','$password')");
        if ($query) {
            header("location:../index.php");
        } else {
            echo "<script>snackbar('Email already exists');</script>";
        }
    }
}
?>
<div class="registration-background">
    <div class="registration-content hospitalRegBackground">
        <div class="registration-box">
        <div class="registration-header header-hospital"><h4>Hospital Registration</h4></div>
<form class="form hospitalForm" action="" method="post">
    <input value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" style="border-top: 1.5px solid rgb(0, 100, 33)" class="form-control" type="text" name="name" placeholder="Hospital Name">
    <input value="<?php echo isset($_POST['address1']) ? $_POST['address1'] : '' ?>"  class="form-control" type="text" name="address1" placeholder="Address1">
    <input value="<?php echo isset($_POST['address2']) ? $_POST['address2'] : '' ?>" class="form-control" type="text" name="address2" placeholder="Address2">
    <input value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>" class="form-control" type="text" name="city" placeholder="City">     
    <input value="<?php echo isset($_POST['state']) ? $_POST['state'] : '' ?>" class="form-control" type="text" name="state" placeholder="State">     
    <input value="<?php echo isset($_POST['pincode']) ? $_POST['pincode'] : '' ?>" class="form-control" type="text" name="pincode" placeholder="Pincode">     
    <input value="<?php echo isset($_POST['contact_person']) ? $_POST['contact_person'] : '' ?>" class="form-control" type="text" name="contact_person" placeholder="Contact Person">     
    <input value="<?php echo isset($_POST['contact_no']) ? $_POST['contact_no'] : '' ?>" class="form-control" type="text" name="contact_no" placeholder="Contact no">     
    <input value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" class="form-control" type="text" name="email" placeholder="Email">     
    <input class="form-control" type="password" name="password" placeholder="Password">     
    <input style="border-bottom: 1.5px solid rgb(0, 100, 33)" class="form-control" type="password" name="password_again" placeholder="Type Password Again">     
    <button type="submit" class="btn btn-primary" name="btnSubmit">Register</button>
</form>

</div>
</div>
</div>


<?php include "../components/scripts.php"; ?>
<?php include "../components/footer.php"; ?>