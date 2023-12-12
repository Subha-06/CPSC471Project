<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$message=$_POST['message'];
$sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="We have received your response and will be in touch shortly";
}
else 
{
$error="You messed up somewhere buddy! ";
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
<title>Simple Contact Page</title>

<!-- Inline CSS for basic styling -->
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
        margin: 0 auto;
        padding: 20px;
    }
    .header, .footer {
        background-color: #ddd;
        text-align: center;
        padding: 10px 0;
    }
    .main-content {
        background-color: #fff;
        padding: 20px;
        margin-top: 20px;
    }
    h1, h3 {
        color: #333;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .btn {
        background-color: #333;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #555;
    }
    .errorWrap, .succWrap {
        padding: 10px;
        margin-bottom: 20px;
        border-left: 4px solid;
    }
    .errorWrap {
        background-color: #ffdddd;
        border-color: #ff5c5c;
    }
    .succWrap {
        background-color: #ddffdd;
        border-color: #5cb85c;
    }
    .back-to-home {
        text-align: center; /* Center the button container */
        margin-top: 20px; /* Add some margin at the top */
    }
    .btn {
        padding: 10px 20px; /* Padding inside the button */
        color: #fff; /* Text color */
        background-color: #007bff; /* Background color */
        border: none; /* No border */
        border-radius: 5px; /* Rounded corners */
        text-decoration: none; /* Remove underline from the text */
        font-size: 16px; /* Set font size */
        transition: background-color 0.3s; /* Smooth transition for background color */
    }
    .btn:hover, .btn:focus {
        background-color: #0056b3; /* Darken background on hover/focus */
        color: #fff; /* Keep text color white */
        text-decoration: none; /* Remove underline from the text */
    }
</style>
</head>
<body>

<div class="back-to-home">
    <a href="index.php" class="btn btn-primary">Back to Home</a>
</div>

<div class="container">
    <!-- Header -->
    <div class="header">
        <h1>Contact Us</h1>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <?php if($error){?>
            <div class="errorWrap"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div>
        <?php } else if($msg){?>
            <div class="succWrap"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div>
        <?php }?>

        <div>
            <form method="post">
                <div class="form-group">
                    <label for="fullname">Full Name <span>*</span></label>
                    <input type="text" name="fullname" class="form-control" id="fullname" required>
                </div>
                <div class="form-group">
                    <label for="emailaddress">Email Address <span>*</span></label>
                    <input type="email" name="email" class="form-control" id="emailaddress" required>
                </div>
                <div class="form-group">
                    <label for="phonenumber">Phone Number <span>*</span></label>
                    <input type="text" name="contactno" class="form-control" id="phonenumber" required>
                </div>
                <div class="form-group">
                    <label for="message">Message <span>*</span></label>
                    <textarea name="message" class="form-control" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <button class="btn" type="submit" name="send">Send Message</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
</div>



<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 
 


</body>
</html>
