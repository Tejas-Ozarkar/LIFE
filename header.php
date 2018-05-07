<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/fontawesome.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/styles.css">
   
    <link href="https://fonts.googleapis.com/css?family=Norican|Raleway" rel="stylesheet">   <title>LIFE </title>
</head>
<body>

 <div id="snackbar">Some text some message..</div>
 <script type="text/javascript">
    function snackbar(msg) {
        var x = document.getElementById("snackbar");
        x.innerHTML = msg;
        x.className = "show";
        setTimeout(function() { x.className = x.className.replace("show", ""); }, 3000);
    }
    </script>
    <style>
.active a {
    color: red !important;
}
      </style>
<?php
error_reporting(0);
session_start();
function home_base_url()
{
    $base_url = (isset($_SERVER['HTTPS']) &&
    $_SERVER['HTTPS']!='off') ? 'https://' : 'http://';
    $tmpURL = dirname(__FILE__);
    $tmpURL = str_replace(chr(92), '/', $tmpURL);
    $tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'], '', $tmpURL);

    $tmpURL = ltrim($tmpURL, '/');

    $tmpURL = rtrim($tmpURL, '/');

    if (strpos($tmpURL, '/')) {
        $tmpURL = explode('/', $tmpURL);
        $tmpURL = $tmpURL[0];
    }
    if ($tmpURL !== $_SERVER['HTTP_HOST']) {
        $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'/';
    } else {
        $base_url .= $tmpURL.'/';
    }
    return $base_url;
}
?>




    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <a class="nav-item nav-link" href="../">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="../hospital/register.php">Register Hospital</a>
        <a class="nav-item nav-link" href="../receiver/register.php">Register Receiver</a>
        <a class="nav-item nav-link" href="../available-blood-samples.php">Available Samples</a>
        </div>
    </div>
    </nav> -->

  <nav class="navbar navbar-expand-lg navbar-light bg-dark bg-white">
  <a class="navbar-brand" href="./index.php"><img style="margin-left: 30px" height="30px" src="./img/logo4.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto ">
      <li class="nav-item ">
        <a class="nav-link <?php if($currentPage =='home'){echo 'active';}?>" href="./">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($currentPage =='availability'){echo 'active';}?>" href="./available-blood-samples.php">Available Samples</a>
      </li> 
      <?php if($_SESSION['user-type']=='hospital'){?>
        <li class="nav-item">
        <a class="nav-link <?php if($currentPage =='dashboard'){echo 'active';}?>" href="./hospital/dashboard.php">Dashboard</a>
       </li>
      <?php } ?>
     
      <?php if($_SESSION['user-type']=='receiver'){?>
        <li class="nav-item">
        <a class="nav-link <?php if($currentPage =='dashboard'){echo 'active';}?>" href="./receiver/dashboard.php">Dashboard</a>
       </li>
      <?php } ?>
     
      <?php if($_SESSION['id']!=null){?>
        <li class="nav-item">
        <a class="nav-link" href="./api/logout.php">Logout</a>
      </li>
      <?php } else{ ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Registration
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item <?php if($currentPage =='regReceiver'){echo 'active';}?>" href="./receiver/register.php">Receiver</a>
          <a class="dropdown-item <?php if($currentPage =='regHospital'){echo 'active';}?>" href="./hospital/register.php">Hospital</a>
        </div>
      </li>
      <?php } ?>
     
    </ul>
  </div>
</nav>
    <div class="app">