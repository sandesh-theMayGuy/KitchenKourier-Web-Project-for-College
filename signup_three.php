<?php

include 'connect.php';
if(isset($_POST["submit"])){
    if(isset($_POST["tc"])){
        session_start();
        $name = $_SESSION["name"];
        $email = $_SESSION["email"];
        $password = md5($_SESSION["password"]);
        

        $query = "INSERT INTO Users values('$name','$email','$password')";

        $result = mysqli_query($conn,$query);
       
        if($result){
            
            //Deleting session variables as the data has been inserted into the database
            unset($_SESSION["name"]);
            unset($_SESSION["email"]);
            unset($_SESSION["password"]);
            session_abort();

            //Redirecting the user to login page 
            
            

            header('Location:login.php');
            exit();
        }

        else{
            echo "Some Error Occured";
        }



    }
}




?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./signup_three.css">
    <link rel="icon" href="./Media/kklogo_final.png">

    <script src="./script.js" defer></script>
    <script src="registration_validation.js" defer></script>

    <title>Sign Up</title>


    <style>

input[type="submit"]{
    margin-left: 45%;
    width: 10%;
    height: 40px;
    border-radius: 20px;
    background-color: green;
    border: none;
    font-size: 30px;
    color: white;
    font-weight: bolder;
    margin-top: 40px;

}

input[type="submit"]:hover{
    background-color: rgb(3, 72, 3);
    cursor: pointer;
    padding-left: 1%;

} 

a{
    color:green;
}

input[type="radio"]{
    height:50px;
    width:20px;
    position:relative;
    right:3%;
}

input[type="radio"]:hover{
    cursor:pointer;
    margin-right:2px;

}



span.ag{
    position:relative;
    bottom:20px;
    right:2.5%;
    font-size:20px;
    font-weight:bolder;
}


    </style>

</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="./index.html"><img id="logo" src="./Media/kklogo_final.png" alt=""></a></li>
            <li class="nav_item" id="home"><a href="./index.html">Home</a></li>
            <li class="nav_item" id="about"><a href="./about.html">About</a></li>
            <li class="nav_item" id="contact"><a href="./contact.html">Contact Us</a></li>

           

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
            <li><a href="./contact.html">Contact</a></li>
            <li><a href="./login.php">Log In</a></li>
        </ul>
    </div>

    <h1 class="title">Sign Up</h1>
    <h3 class="title">Go through our 3-steps signup process to get registered</h3>
    <div class="steps">
        <div id="one">1</div>
        <div id="two">2</div>
        <div id="three">3</div>
    </div>



    <center>
        <div class="form">
            <!-- <h1 id="title">Terms and Conditions</h1> <br> <br> -->

            <br><br>
        <form action="" method="POST">
                <h1>Do you agree to the <a href="tc.html" target="_blank">terms and conditions?</a></h1>
                
                <input name="tc" type="radio" value="agree"> <span class="ag">I Agree</span> 
                


           
            <!-- <a href="signup_three.html"> <br><br><div title="Finish" class="next">Finish </div></a> <br><br> -->

        </center>

        <input name="submit" type="submit" value="Finish">

    
    </form>

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