<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Pathao Car Rental</title>


<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    color: #333;
  }
  .container {
    width: 80%;
    margin: 20px auto;
    padding: 15px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  .section-header {
    text-align: center;
    margin-bottom: 20px;
  }
  .section-header h2 {
    color: #333;
    font-size: 24px;
  }
  .section-header span {
    color: #007bff;
  }
  .car-list {
    list-style: none;
    padding: 0;
  }
  .car-list li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
  }
  .car-title-m {
    margin-top: 10px;
  }
  .price {
    color: #28a745;
    font-weight: bold;
  }
  a {
    color: #007bff;
    text-decoration: none;
  }
  a:hover {
    text-decoration: underline;
  }
  .back-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    font-size: 24px;
  }
</style>
</head>
<body>
        
<?php include('includes/header.php'); ?>
 
<section class="section-padding">
  <div class="container">
    <div class="section-header text-center">
      <h2>Find the Best Car For You And Your Family! </h2>
      <p>Explore our available cars in the <a href="car-listing.php">Car Listing</a> section.</p>
      <p>Register or log in to create your profile.</p>
      <p>List your own vehicles or rent one from our community.</p>
      <p>Enjoy your journey with Pathao Car Rentals!</p>
    </div>

    <div>
      <?php
      $sql = "SELECT tblvehicles.VehiclesTitle, tblbrands.BrandName, tblvehicles.PricePerDay, tblvehicles.FuelType, tblvehicles.ModelYear, tblvehicles.id, tblvehicles.SeatingCapacity, tblvehicles.VehiclesOverview FROM tblvehicles JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand";
      $query = $dbh->prepare($sql);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      if ($query->rowCount() > 0) {
          foreach ($results as $result) { ?>
            <ul class="car-list">
              <li>
                <div class="car-info-box">
                  <?php echo htmlentities($result->FuelType); ?>,
                  <?php echo htmlentities($result->ModelYear); ?> Model,
                  <?php echo htmlentities($result->SeatingCapacity); ?> seats
                </div>
                <div class="car-title-m">
                  <h6>
                    <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                      <?php echo htmlentities($result->BrandName); ?>,
                      <?php echo htmlentities($result->VehiclesTitle); ?>
                    </a>
                  </h6>
                  <span class="price">$<?php echo htmlentities($result->PricePerDay); ?> /Day</span>
                </div>
                <div class="inventory_info_m">
                  <p><?php echo substr($result->VehiclesOverview, 0, 70); ?></p>
                </div>
              </li>
            </ul>
          <?php }
      } ?>
    </div>
  </div>
</section>



<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i></a> </div>



<?php include('includes/login.php'); ?>



<?php include('includes/registration.php'); ?>


<?php include('includes/footer.php'); ?>

</body>
</html>