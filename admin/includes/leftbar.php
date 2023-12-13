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

        .ts-sidebar {
            background-color: #4460c4;
            color: #000;
            height: 100%;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            padding-top: 20px;
        }

        .ts-sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .ts-sidebar-menu li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .ts-sidebar-menu li a {
            color: #000;
            text-decoration: none;
            display: block;
        }

        .ts-sidebar-menu li a:hover {
            background-color: #ddd;
            color: #333;
        }

        .ts-sidebar-menu li ul {
            list-style: none;
            padding-left: 20px;
            display: none;
        }

        .ts-sidebar-menu li:hover ul {
            display: block;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <nav class="ts-sidebar">
        <ul class="ts-sidebar-menu">
            <li class="ts-label">Main</li>
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
            <li><a href="manage-pages.php"><i class="fa fa-files-o"></i> Manage Pages</a></li>
            <li><a href="update-contactinfo.php"><i class="fa fa-files-o"></i> Update Contact Info</a></li>
        </ul>
    </nav>

</body>

</html>
