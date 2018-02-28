<?php
ob_start();
	include 'common.php';

page_protect();
if (!isset($_SESSION['user_id']) && !isset($_SESSION['token']))
{
	header("location:logout.php");
}
$user_session = $_SESSION['user_session'];



if(isset($_GET['s']))
{
//	var_dump($_POST);
	$message = $_GET['s'];
}

	include 'final_header.php';
	 ob_end_flush();
?>

<div class="container-fluid">
    <div class="">
    	<div class="row " >
		    <div class="col-sm-12 col-md-12">
		    	<form action="successsend.php" method="post">
			    	<div class="card text-black bg-success">
		                <div class="card-header text-center text-black">
		                    <h1 class="text-black">Withdrawal Response</h1>
		                </div>
		                <div class="card-body bg-white text-center text-success">
		                    <?php if(!empty($message)){ ?>
								<label>The transaction has been  <?php echo $message;?> initiated.</label>
							<?php
							} else {
							?>
								<label class="text-warning">There is some issue in processng your transaction. Please try after some time</label>
							<?php
							}
							?>
		                </div>

		            </div>
		        </form>
		    </div>
		</div>
    </div>
</div>

<?php
	include 'footer.php';
?>
