<?php
$loginerr = "";



include 'connect.php';

function input_data($data){
    stripslashes($data);
    htmlspecialchars($data);
    trim($data);
    return $data;
}

if(isset($_POST["login"])){
    $email = input_data($_POST["email"]);
    $password = md5(input_data($_POST["password"]));

    $query = "SELECT * FROM Users WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)==1){
        $rows = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION["username"] =$rows["name"];
        $_SESSION["useremail"] = $rows["email"];


        header('Location:user_dashboard.php');
        exit();

        // $row = mysqli_fetch_assoc($result);

        // echo $row["email"];
        // echo $row["name"];
        // echo $row["password"];

        
    }

    else{
            $loginerr="Invalid Credentials";
            
    }
 
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <script src="./script.js" defer></script>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./login.css">
    <link rel="icon" href="./Media/kklogo_final.png">

</head>
<body>
    
    <div class="navbar">
        <ul>
            <li><a href="./index.html"><img id="logo" src="./Media/kklogo_final.png" alt=""></a></li>
            <li class="nav_item" id="home"><a href="./index.html">Home</a></li>
            <li class="nav_item" id="about"><a href="./about.html">About</a></li>
            <li class="nav_item" id="contact"><a href="./contact.php">Contact Us</a></li>

           

            <li class="nav_item" id="log_in"><a href="login.php">Log In</a></li>
        </ul>
    </div>

    <div class="menu_container">

    <button id="menu"><img src="./Media/menu.png" alt=""> </a> </button>
    </div>

    <div id="menu_items">
        <ul>
            <li><a href="./index.html">Home</a></li>
            <li><a href="./about.html">About</a></li>
            <li><a href="./contact.php">Contact</a></li>
            <li><a href="./login.php">Log In</a></li>
        </ul>
    </div>



    <div class="login-form">

        <h1 id="login-title">Login to Your Account</h1> <br> <br>
        <form action="" method="POST"> 
        Email :  <br><input type="email" name="email"> <br> <br>
        Password :  <br><input type="password" name="password"> 
        <p style="color:red;font-size:20px;font-weight:bolder;">  <?php echo $loginerr;?></p>  <br>
      
        <button name="login" id="login">Log In </button>
    </form>
    </div>

    <br><br> <br>

    <hr class="hr-text" data-content="OR">

    <p style="text-align: center;">Don't Have an Account ?</p>
    <!-- <button style="margin-left:48%" id="sign-up">Sign Up</button> -->
    <a href="./signup_one.php" style="margin-left: 48%;" id="sign-up">Sign Up</a>

    <div class="join-us">
        <img src="../Source/Media/join-us.png" alt="">
    </div>
    <div class="footer">
        &copy; 2023 Kitchen Kourier Pvt. Ltd.
    </div>
    
</body>
</html>




<?php






?>