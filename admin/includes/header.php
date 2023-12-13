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

  .logo a {
    
    display: block;
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
    top: 80%; 
    left: 0;
    list-style: none;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
</style>

<header>
  <div class="custom-navbar">

    <div class="logo">
      <a href="../index.php"><img src="img/logo.png" alt="image"/></a>
    </div>
    <div class="navbar">
      <ul class="ts-profile-nav">
        <li class="ts-account">
          <ul>
		  	<li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="change-password.php">Change Password</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</header>
