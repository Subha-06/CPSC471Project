<style>
  header {
    background-color: #fff;
    padding: 15px;
    font-family: Arial, sans-serif;
  }

  .custom-navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .logo img {
    max-height: 50px; 
  }

  .navbar {
    display: flex;
    margin-left: 20px; 
  }

  .navbar ul {
    list-style: none;
    display: inline-flex;
    margin: 20px;
  }

  .navbar li {
    margin-right: 100px;
  }

  .navbar a {
    text-decoration: none;
    color: #333;
  }

  .dropdown {
    margin-left: 15px;
    position: relative;
  }

  .dropdown-menu {
    position: absolute;
    top: 80%%;
    left: 20%;
    list-style: none;
    padding: 15px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
</style>


<header>
  <div class="custom-navbar">
    <div class="logo">
      <a href="index.php"><img src="assets/images/logo.png" alt="image"/></a>
    </div>
    <div class="navbar">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="page.php?type=aboutus">About Us</a></li>
        <li><a href="car-listing.php">Car Listing</a></li>
        <li><a href="contact-us.php">Contact Us</a></li>
        <?php if (strlen($_SESSION['login']) == 0) { ?>
          <li><a href="#loginform" data-toggle="modal" data-dismiss="modal">Login / Register</a></li>
        <?php } else { ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php
              $email = $_SESSION['login'];
              $sql = "SELECT FullName FROM tblusers WHERE EmailId=:email ";
              $query = $dbh->prepare($sql);
              $query->bindParam(':email', $email, PDO::PARAM_STR);
              $query->execute();
              $results = $query->fetchAll(PDO::FETCH_OBJ);
              if ($query->rowCount() > 0) {
                foreach ($results as $result) {
                  echo htmlentities($result->FullName);
                }
              } ?>
              <i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="logout.php">Sign Out</a></li>
            </ul>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</header>
