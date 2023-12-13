<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	
if(isset($_POST['submit']))
{
$brand=$_POST['brand'];
$id=$_GET['id'];
$sql="update  tblbrands set BrandName=:brand where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':brand',$brand,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

$msg="Brand updted successfully";

}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Portal | Admin Create Brand</title>
	<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .ts-main-content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .content-wrapper {
        width: 80%;
        max-width: 600px; 
        padding: 40px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        transition: box-shadow 0.3s;
        position: relative;
        margin-top: -170px;
    }

    .content-wrapper:hover {
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    .errorWrap, .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    .content-wrapper:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.1);
        pointer-events: none;
        border-radius: 10px;
        transition: transform 0.3s;
    }

    .content-wrapper:hover:before {
        transform: scale(1.1);
    }

    h2 {
        margin: 0 0 30px 0;
        color: #333;
        text-align: center;
    }

    input[type="text"], input[type="email"], input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 0 0 20px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #5C6BC0;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 18px;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #3F51B5;
    }
</style>



</head>

<body>
<?php include('includes/leftbar.php');?>
	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Create Brand</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
										
											
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<?php	
$id=$_GET['id'];
$ret="select * from tblbrands where id=:id";
$query= $dbh -> prepare($ret);
$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
											<div class="form-group">
												<label class="col-sm-4 control-label">Brand Name</label>
												<div class="col-sm-8">
													<input type="text" class="form-control" value="<?php echo htmlentities($result->BrandName);?>" name="brand" id="brand" required>
												</div>
											</div>
											<div class="hr-dashed"></div>		
										<?php }} ?>	
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
												<button class="btn btn-primary" name="submit" type="submit" style="background-color: #fb4d4d; color: #fff;">Submit</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
<?php } ?>