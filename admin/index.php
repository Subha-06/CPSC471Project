<?php
session_start();
include('includes/config.php');

if(isset($_POST['login']))
{
    $email=$_POST['username'];
    $password=($_POST['password']);
    $sql ="SELECT UserName,Password FROM admin WHERE UserName=:email and Password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        $_SESSION['alogin']=$_POST['username'];
        echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
    } else{
        echo "<script>alert('Invalid Details');</script>";
    }
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

    <title>Car Rental Portal | Admin Login</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        html, body {
            height: 100%;
        }
        .form-content {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 70vh;
            margin: 0;
        }
        .well {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h1 {
            color: #333;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-size: 14px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

<!--Header-->
<?php include('includes/header.php'); ?>
<!-- /Header -->

<div class="form-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="text-center text-bold text-light mt-4x">Sign in</h1>
                <div class="well row pt-2x pb-3x bk-light">
                    <div class="col-md-8 col-md-offset-2">
                        <form method="post">

                            <label for="" class="text-uppercase text-sm">Your Username </label>
                            <input type="text" placeholder="Username" name="username" class="form-control mb">

                            <label for="" class="text-uppercase text-sm">Password</label>
                            <input type="password" placeholder="Password" name="password" class="form-control mb">

                            <button class="btn btn-primary btn-block" name="login" type="submit" style="background-color: red;"> LOGIN</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
