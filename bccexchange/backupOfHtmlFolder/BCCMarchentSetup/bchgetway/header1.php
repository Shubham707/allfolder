
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<body>
	<div class="wrapper">

<header class="main-header" style="background-color: darkkhaki;">
<!-- Logo -->
<a href="#" class="logo">
<!-- mini logo for sidebar mini 50x50 pixels -->
<span class="logo-mini"></span>
<!-- logo for regular state and mobile devices -->
<span class="logo-lg" style="color: white;">
  <img src="frontend/assets/media/general/logo.png" width="129" class="user-image" alt="">
frontend/assets/media/general/logo.png;</span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top " style="background-color: darkkhaki;">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" >
<span class="sr-only" ></span>
</a>

<div class="navbar-custom-menu">
<ul class="nav navbar-nav">

<li class="dropdown messages-menu">
</li>
<li class="dropdown user user-menu" style="background-color: darkkhaki;">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: darkkhaki;">
  <?php if(@$data['profile_picture']){?>
  <img src="upload/<?php echo $data['profile_picture']?>" class="user-image" alt=""><span class="hidden-xs"></span>
              <?php } else { ?>
              <img src="img_avatar3.png" class="user-image" alt=""><span class="hidden-xs"></span>
             <?php }?>

</a>
<ul class="dropdown-menu" style="width: 0px;">

<li class="user-footer" style="background-color: darkkhaki !important;">
<div class="pull-center"  style=" margin-left: 32px;
" >
<a href="logout_merchant.php" class="btn btn-default btn-flat">Sign out</a>
</div>
</li>
</ul>
</li>
</ul>
</div>
</nav>
</header>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Picture</h4>
      </div>
      <div class="modal-body">
        <form  name="photo_upload" action="lib/upload.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                  <input id="exampleInputEmail1" placeholder="Picture" type="file" name="profile_picture">
                </div>
              </div>
              <!-- /.box-body -->
              <input type="hidden" name="id" value="<?php echo $data['id'];?>">
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Upload</button>
              </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>