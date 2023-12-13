<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Car Rental Portal | Admin Panel</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .ts-navbar {
            background-color: #fff;
            color: #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 35px;
        }

        .ts-navbar-menu {
            list-style: none;
            display: flex;
            margin: 0;
        }

        .ts-navbar-menu li {
            margin-right: 20px;
        }

        .ts-navbar-menu a {
            color: #000;
            text-decoration: none;
        }

        .ts-navbar-menu a:hover {
            color: #fff;
        }

        .ts-navbar-menu li ul {
            list-style: none;
            padding-left: 20px;
            display: none;
        }

        .ts-navbar-menu li:hover ul {
            display: block;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="ts-navbar">
        <div class="ts-logo">
            <a href="../index.php"><img src="img/logo.png" alt="image"/></a>
        </div>
        <ul class="ts-navbar-menu">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li>
                <a href="#"><i class="fa fa-files-o"></i> Brands</a>
                <ul>
                    <li><a href="create-brand.php">Create Brand</a></li>
                    <li><a href="manage-brands.php">Manage Brands</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Vehicles</a>
                <ul>
                    <li><a href="post-avehical.php">Post a Vehicle</a></li>
                    <li><a href="manage-vehicles.php">Manage Vehicles</a></li>
                </ul>
            </li>

            <li><a href="manage-bookings.php"><i class="fa fa-users"></i> Manage Booking</a></li>
            <li><a href="manage-conactusquery.php"><i class="fa fa-desktop"></i> Manage Contact Us Query</a></li>
            <li><a href="update-contactinfo.php"><i class="fa fa-files-o"></i> Update Contact Info</a></li>
            <li><a href="logout.php">Logout</a></li>

        </ul>
    </nav>

</body>

</html>
