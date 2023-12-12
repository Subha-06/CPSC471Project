<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Car Rental Portal | Car Listing</title>

<style>
    body { font-family: Arial, sans-serif; }
    .container { width: 80%; margin: auto; }
    .page-heading { font-size: 24px; margin-top: 20px; }
    .product-listing-m { border: 1px solid #ddd; padding: 10px; margin-top: 10px; }
    .product-listing-img img { width: 100%; height: auto; }
    .product-listing-content { margin-left: 20px; }
    ul { list-style: none; padding: 0; }
    ul li { margin-bottom: 5px; }
    .btn { display: inline-block; padding: 10px 15px; background-color: #ddd; color: #333; text-decoration: none; margin-top: 10px; }
</style>
</head>
<body>

<!--Header--> 
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Car Listing</h1>
      </div>
    </div>
  </div>
</section>
<!-- /Page Header--> 

<!--Listing-->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
            <?php 
            //Query for Listing count
            
            $sql = "SELECT id from tblvehicles";
            $query = $dbh -> prepare($sql);
            $query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=$query->rowCount();
            ?>
            <p><span><?php echo htmlentities($cnt);?> Listings</span></p>
          </div>
        </div>

        <!-- Products Listing -->
        <!-- Add your PHP code here for listing products -->

      </div>
      
      <!--Side-Bar-->
      <!-- Add your side-bar code here -->
      <!--/Side-Bar--> 
    </div>
  </div>
</section>
<!-- /Listing--> 

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

</body>
</html>