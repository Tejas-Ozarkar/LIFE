<?php 
$currentPage = 'home';
include "./header.php"; ?>
<?php include "./config/dbconnect.php";
   if (isset($_POST['btnSubmitHospital'])) {
       extract($_POST);
       $sql="SELECT * FROM hospitals where email = '$email' and password = '$password'";
       $query=mysqli_query($con, $sql);
       if (mysqli_num_rows($query)==1) {
           $row=mysqli_fetch_assoc($query);
           if ($row['email']==$email && $row['password']==$password) {
               session_start();
               $_SESSION['id']=$row['id'];
               $_SESSION['user-type']='hospital';
               header("location: hospital/dashboard.php");
           }
         
       }
       else{
        echo '<script type="text/javascript">',
        'snackbar("Invalid credentials");',
        '</script>';
    }
     
   }
    if (isset($_POST['btnSubmitReceiver'])) {
        extract($_POST);
        $sql="SELECT * FROM receivers where email = '$email' and password = '$password'";
        $query=mysqli_query($con, $sql);
        if (mysqli_num_rows($query)==1) {
            $row=mysqli_fetch_assoc($query);
            if ($row['email']==$email && $row['password']==$password) {
                session_start();
                $_SESSION['id']=$row['id'];
                $_SESSION['user-type']='receiver';
                header("location: receiver/dashboard.php");
            }
           
        }
        else{
            echo '<script type="text/javascript">',
            'snackbar("Invalid credentials");',
            '</script>';
        }
        
    }
?>
<div class="row main">
    <div class="col-md-8 content-side">
        <div class="content-side-filter">
            <h1>Welcome to L!FE </h1>
            <br>
            <h4>We help you to find available blood samples near you</h4><br><br>
            <a href="./available-blood-samples.php">See Availability</a>
        </div>
    </div>
    <div class="col-md-4 login-side">
        <div class="login-side-filter">
            <div class="login">
                <div class="tabs">
                    <button  id="tabReceiver">Receiver</button>
                    <button  id="tabHospital">Hospital</button>
                </div>
                <div class="login-form-box">
                    <div class="login-receiver">
                        <form method="post">
                            <i class="fas fa-user"></i>
                            <input type="text" class="form-control" placeholder="Email" name="email">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <button class="btn btn-primary" type="submit" name="btnSubmitReceiver">Login</button>
                        </form>
                    </div>
                    <div class="login-hospital">
                        <form method="post">
                            <i class="fas fa-user-md"></i>
                            <input type="text" class="form-control" placeholder="Email" name="email">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <button class="btn btn-success" type="submit" name="btnSubmitHospital">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
 $sql = "SELECT count(*) FROM receivers";
 $result = mysqli_query($con, $sql);
 $row = mysqli_fetch_assoc($result);
 $total_receivers = $row['count(*)'];
 
 $sql = "SELECT count(*) FROM hospitals";
 $result = mysqli_query($con, $sql);
 $row = mysqli_fetch_assoc($result);
 $total_hospitals = $row['count(*)'];
 
 $sql = "SELECT sum(samples) FROM hospital_blood";
 $result = mysqli_query($con, $sql);
 $row = mysqli_fetch_assoc($result);
 $total_samples = $row['sum(samples)'];

 $sql = "SELECT count(*) FROM requests WHERE status='accept'";
 $result = mysqli_query($con, $sql);
 $row = mysqli_fetch_assoc($result);
 $total_accepted = $row['count(*)'];


?>
<div class="container">
    <div class="statistics row">
        <div class="col-md-3 col-sm-6 col-6">
            <div class="card-statistics row">
                <div class="col-md-4">
                    <i class="fas fa-user"></i>
                </div>
                <div class="col-md-8">
                    <h2><?php echo $total_receivers; ?></h2>
                    <p>Total Receivers</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-6">
            <div class="card-statistics row">
                <div class="col-md-4">
                    <i class="fas fa-hospital"></i>
                </div>
                <div class="col-md-8 ">
                   <h2> <?php echo $total_hospitals; ?></h2>
                    <p>Total Hospitals</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-6">
            <div class="card-statistics row">
            <div class="col-md-4">
                <i class="fas fa-tint"></i>
            </div>
            <div class="col-md-8">
                <h2><?php echo $total_samples; ?></h2>
                <p>Total  Samples</p>
            </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-6">
            <div class="card-statistics row">
            <div class="col-md-4">
            <i class="fas fa-check-circle"></i>
            </div>
            <div class="col-md-8">
                <h2><?php echo $total_accepted; ?></h2>
                <p>Accepted Requests</p>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include "./scripts.php"; ?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabReceiver').click(function() {
            $('.login-hospital').hide();
            $('.login-receiver').show();
            $(this).css("background-color", "rgba(56, 55, 55, 0.432)");
            $(this).css("color", "white");
            $('#tabHospital').css("background-color", "rgba(218, 212, 212, 0.774)");
            $('#tabHospital').css("color", "#333");
        });
        $('#tabHospital').click(function() {
            $('.login-hospital').show();
            $('.login-receiver').hide();
            $(this).css("background-color", "rgba(56, 55, 55, 0.432)");
            $(this).css("color", "white");
            $('#tabReceiver').css("background-color", "rgba(218, 212, 212, 0.774)");
            $('#tabReceiver').css("color", "#333");
        });
    });
</script>
<?php
 include "./components/footer.php";
?>