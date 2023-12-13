<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from tblbrands  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Page data updated  successfully";

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
	
	<title>Car Rental Portal |Admin Manage Brands   </title>


	<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f4;
    }

    .ts-main-content {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .content-wrapper {
        width: 80%;
        max-width: 800px;
        padding: 30px;
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        transition: box-shadow 0.3s;
    }

    .content-wrapper:hover {
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
    }

    .panel-heading {
        background-color: #fb4d4d;
        color: #fff;
        padding: 10px;
        border-radius: 5px 5px 0 0;
    }

    .panel-body {
        padding: 20px;
    }

    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #fb4d4d;
        color: #fff;
    }

    tbody tr:hover {
        background-color: #f5f5f5;
    }

    .fa-edit,
    .fa-close {
        font-size: 18px;
        margin-right: 10px;
        cursor: pointer;
    }

    .fa-close {
        color: #dc3545;
    }

	.edit-link {
        color: #007bff; /* Set the color to your preference */
        text-decoration: none;
        border-bottom: 1px dashed #007bff; /* Add an underline effect */
        transition: color 0.3s; /* Add a smooth color transition on hover */
    }

    .edit-link:hover {
        color: #0056b3; /* Change the color on hover */
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

						<h2 class="page-title">Manage Brands</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Listed  Brands</div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
												<th>Brand Name</th>
											<th>Creation Date</th>
											<th>Updation date</th>
										
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
											<th>Brand Name</th>
											<th>Creation Date</th>
											<th>Updation date</th>
										
											<th>Action</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

									<?php $sql = "SELECT * from  tblbrands ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->BrandName);?></td>
											<td><?php echo htmlentities($result->CreationDate);?></td>
											<td><?php echo htmlentities($result->UpdationDate);?></td>
											<td>
    											<a href="edit-brand.php?id=<?php echo $result->id; ?>" class="edit-link">Edit</a>&nbsp;&nbsp;
    											<a href="manage-brands.php?del=<?php echo $result->id; ?>" onclick="return confirm('Do you want to delete');">Delete</a>
											</td> 
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>
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
