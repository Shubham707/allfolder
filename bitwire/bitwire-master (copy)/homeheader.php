<?php
include_once('common.php');

/*page_protect();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['token']))
{
    header("location:logout.php");
}*/

@$user_email = $_SESSION['user_session'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BTG wallet">
    <meta name="author" content="Bitcoin cash Foundation">
    <meta name="keyword" content="BTG Wallet, bitcoin cash, bitcoin, wallet, bcc, bch, btc bch">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Bitwire </title>

    <!-- Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

    <link href="css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- MDL LIB -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
     <script type="text/javascript" src="js/sails.io.js"></script>
     <script type="text/javascript">
        io.sails.url = 'http://199.188.206.184:1337';
        url_api='http://199.188.206.184:1337';
    </script>
    <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.highcharts.com/stock/highstock.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="stylesheet">
</head>
    <!-- Main styles for this application -->

    <link href="css/style.css" rel="stylesheet">
    <link href="./assets/css" rel="stylesheet">

<link rel="stylesheet" href="./assets/bootstrap.min.css">
<link rel="stylesheet" href="./assets/website.css">

</head>


<body >
<header class="app-header navbar hidden-xs hidden-sm">
        <a class="navbar-brand" href="indexnew.php"></a>
        <ul class="nav navbar-nav ml-auto">
              
              <li class="nav-item nav-dropdown">
                  <a class="nav-link" href="indexnew.php">Home</a>
              </li>
               <li class="nav-item nav-dropdown">
                  <a class="nav-link" href="loginnew.php">Login</a>
              </li>
              <li class="nav-item nav-dropdown">
                  <a class="nav-link" href="signupnew.php">Sign-Up</a>
              </li>           

                 

        </ul>
    </header>
    <div class="app-header navbar navbar visible-xs visible-sm">
    
    <a class="navbar-brand" href="indexnew.php"></a>
    <div class="dropdown pull-right">
      <button class="btn btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
        <i class="fa fa-bars " aria-hidden="true"></i>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          <li class="nav-item nav-dropdown">
                  <a class="nav-link" href="indexnew.php">Home</a>
              </li>
               <li class="nav-item nav-dropdown">
                  <a class="nav-link" href="loginnew.php">Login</a>
              </li>
              <li class="nav-item nav-dropdown">
                  <a class="nav-link" href="signupnew.php">Sign-Up</a>
              </li>
    </div>

  </div>



<main class="main">
