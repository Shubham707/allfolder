
<aside class="main-sidebar" style="background-color: black;">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<!-- Sidebar user panel -->
<div class="user-panel">
<div class="pull-left image">
<?php  if(@$data['profile_picture']){?>
<img  data-toggle="modal" data-target="#myModal" src="http://104.219.248.173/bchgateway/upload/<?php echo $data['profile_picture']?>" class="profile-user-img img-responsive" alt="" style="margin-top: 30px; height:70px; width:70px !important;">
  <span class="hidden-xs"></span>
              <?php } else { ?>
              <img data-toggle="modal" data-target="#myModal" src="img_avatar3.png" class="user-image" alt=""><span class="hidden-xs"></span>
             <?php }?>
</div>
<div class="pull-left info">
<p></p>
<a href="#"><i class="fa fa-circle text-success"></i></a>
</div>
</div>


<ul class="sidebar-menu" style="background: black;">

<li class="active treeview">
<a href="merchantprofile.php" style="color: white;">
<i class="fa fa-dashboard" style="color: white;"></i> <span>Dashboard</span>
<span class="pull-right-container">
</span>
</a>
</li>

<li><a href="trans_merchant.php" style="color: white;"><i class="fa fa-circle-o"></i>Transaction</a></li>
<!-- <li><a href="pending_merchant.php"><i class="fa fa-circle-o"></i>Pending</a></li> -->
<li><a href="api_merchant.php" style="color: white;"><i class="fa fa-circle-o"></i>Guide</a></li>
<li><a href="paymenttool.php" style="color: white;"><i class="fa fa-circle-o"></i>Payment Tool</a></li>
<li><a href="withdraw.php" style="color: white;"><i class="fa fa-circle-o"></i>Withdraw BCH</a></li>
<li><a href="support.php" style="color: white;"><i class="fa fa-circle-o"></i>Help & Support</a></li>
</li>


</ul>
</section>
<!-- /.sidebar -->
</aside>

