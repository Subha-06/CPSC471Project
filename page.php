<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Car Rental Portal | Page details</title>

<!-- Inline CSS -->
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
  .page-header {
    background-color: #ddd;
    padding: 10px 0;
    text-align: center;
    margin-bottom: 20px;
  }
  .section-padding {
    text-align: center;
    margin: 20px 0;
  }
  .back-to-home {
    text-align: center;
    margin-top: 20px;
  }
  a.btn {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
  }
  a.btn:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>
        

<?php include('includes/header.php'); ?>


<?php 
$pagetype = $_GET['type'];
$sql = "SELECT type, detail, PageName FROM tblpages WHERE type=:pagetype";
$query = $dbh -> prepare($sql);
$query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
  foreach ($results as $result) { ?>
    <div class="page-header">
      <h1><?php echo htmlentities($result->PageName); ?></h1>
    </div>
    <div class="container section-padding">
      <h2><?php echo htmlentities($result->PageName); ?></h2>
      <p><?php echo $result->detail; ?></p>
      <div class="back-to-home">
        <a href="index.php" class="btn">Back to Home</a>
      </div>
    </div>
  <?php }
}
?>

<?php include('includes/footer.php'); ?>


</body>
</html>