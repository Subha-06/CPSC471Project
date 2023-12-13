<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit']))
{
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$message=$_POST['message'];
$useremail=$_SESSION['login'];
$status=0;
$vhid=$_GET['vhid'];
$sql="INSERT INTO  tblbooking(userEmail,VehicleId,FromDate,ToDate,message,Status) VALUES(:useremail,:vhid,:fromdate,:todate,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}

}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Car Rental Portal | Vehicle Details</title>

<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 0;
  }
  .container {
    width: 80%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  .img-responsive {
    max-width: 100%;
    height: auto;
  }
  .section-padding {
    margin: 20px 0;
  }
  .dark-overlay {
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
  .btn {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    border: none;
    cursor: pointer;
  }
  .btn:hover {
    background-color: #0056b3;
  }
  .list-price {
    color: #28a745;
  }
  .features_list {
    list-style: none;
    padding-left: 0;
  }
  .features_list li {
    display: inline;
    margin-right: 10px;
  }
</style>
</head>
<body>

<?php include('includes/header.php'); ?>

<!-- Page Content -->
<?php
$vhid = intval($_GET['vhid']);
$sql = "SELECT tblvehicles.*, tblbrands.BrandName, tblbrands.id as bid FROM tblvehicles JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand WHERE tblvehicles.id = :vhid";
$query = $dbh->prepare($sql);
$query->bindParam(':vhid', $vhid, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
  foreach ($results as $result) {  
    $_SESSION['brndid'] = $result->bid;  
?>

<section id="carimage" class="container">
  <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="image">
</section>

<!-- Vehicle Details Section -->
<section class="listing-detail section-padding">
  <div class="container">
    <h2><?php echo htmlentities($result->BrandName); ?>, <?php echo htmlentities($result->VehiclesTitle); ?></h2>
    <p class="list-price">$<?php echo htmlentities($result->PricePerDay); ?> Per Day</p>
    
    <p><?php echo htmlentities($result->VehiclesOverview); ?></p>
    
    <ul class="features_list">
      <li><?php echo htmlentities($result->SeatingCapacity); ?> seats</li>
      <li><?php echo htmlentities($result->ModelYear); ?> model</li>
      <li><?php echo htmlentities($result->FuelType); ?></li>
    </ul>
  </div>

        <!-- Accessories -->
        <div role="tabpanel" class="tab-pane" id="accessories"> 
                
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Accessories</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Air Conditioner</td>
<?php if($result->AirConditioner==1)
{
?>
                      <td><i class=" 1check" aria-hidden="true"></i></td>
<?php } else { ?> 
   <td><i class=" 2check" aria-hidden="true"></i></td>
   <?php } ?> </tr>

<tr>
<td>AntiLock Braking System</td>
<?php if($result->AntiLockBrakingSystem==1)
{
?>
<td><i class=" 1check" aria-hidden="true"></i></td>
<?php } else {?>
<td><i class=" 2check" aria-hidden="true"></i></td>
<?php } ?>
                    </tr>

<tr>
<td>Power Steering</td>
<?php if($result->PowerSteering==1)
{
?>
<td><i class=" 1check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class=" 2check" aria-hidden="true"></i></td>
<?php } ?>
</tr>
                   

<tr>

<td>Power Windows</td>

<?php if($result->PowerWindows==1)
{
?>
<td><i class=" 1check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class=" 2check" aria-hidden="true"></i></td>
<?php } ?>
</tr>
                   
 <tr>
<td>CD Player</td>
<?php if($result->CDPlayer==1)
{
?>
<td><i class=" 1check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class=" 2check" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Leather Seats</td>
<?php if($result->LeatherSeats==1)
{
?>
<td><i class=" 1check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class=" 2check" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Central Locking</td>
<?php if($result->CentralLocking==1)
{
?>
<td><i class=" 1check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class=" 2check" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Power Door Locks</td>
<?php if($result->PowerDoorLocks==1)
{
?>
<td><i class=" 1check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class=" 2check" aria-hidden="true"></i></td>
<?php } ?>
                    </tr>
                    <tr>
<td>Brake Assist</td>
<?php if($result->BrakeAssist==1)
{
?>
<td><i class=" 1check" aria-hidden="true"></i></td>
<?php  } else { ?>
<td><i class=" 2check" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Driver Airbag</td>
<?php if($result->DriverAirbag==1)
{
?>
<td><i class=" 1check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class=" 2check" aria-hidden="true"></i></td>
<?php } ?>
 </tr>
 
 <tr>
 <td>Passenger Airbag</td>
 <?php if($result->PassengerAirbag==1)
{
?>
<td><i class=" 1check" aria-hidden="true"></i></td>
<?php } else {?>
<td><i class=" 2check" aria-hidden="true"></i></td>
<?php } ?>
</tr>

<tr>
<td>Crash Sensor</td>
<?php if($result->CrashSensor==1)
{
?>
<td><i class=" 1check" aria-hidden="true"></i></td>
<?php } else { ?>
<td><i class=" 2check" aria-hidden="true"></i></td>
<?php } ?>
</tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          
        </div>
<?php }} ?>
          <form method="post">
            <div class="form-group">
              <input type="text" class="form-control" name="fromdate" placeholder="From Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="todate" placeholder="To Date(dd/mm/yyyy)" required>
            </div>
            <div class="form-group">
              <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
            </div>
          <?php if($_SESSION['login'])
              {?>
              <div class="form-group">
                <input type="submit" class="btn"  name="submit" value="Book Now">
              </div>
              <?php } else { ?>
<a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login For Book</a>

              <?php } ?>
          </form>
        </div>
      </aside>
      
</section>


    <?php include('includes/footer.php'); ?>
</body>
</html>
