<?php

$otperr = "";
session_start();
$email = ($_SESSION["email"]);
$name = ($_SESSION["name"]);
// $password = ($_SESSION["password"]);

?>


<!-- providing source to smtp.js library used for sending email for OTP verification -->
<script src="https://smtpjs.com/v3/smtp.js"></script> 

<script>
//  Using smtp.js library to send otp as an email to provided address 

  

    


    //security token :  773fe742-df75-4a3b-a4f3-782682c67d28
        
    
 

        const otp = Math.floor(Math.random()*9999);  //generate random otp

        console.log(otp);


        email = "<?php echo $email;   ?>";  
        name = "<?php echo $name;  ?>";
       

        
   

  
        Email.send({
        SecureToken : "773fe742-df75-4a3b-a4f3-782682c67d28", //provided by smtp.js
        To : email,
        From : "khatiwadasandesh01@gmail.com",
        Subject : "Kitchen Kourier : OTP for email verification",
        Body : `Hello, ${name}! Welcome to Kitchen Kourier! Your One Time Password (OTP) is ${otp} . Use it for email verification.`
    });


 

    

</script>













<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <!-- <link rel="stylesheet" href="./signup_one.css"> -->
    <link rel="stylesheet" href="./signup_two.css">
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
    margin-top: 20px;

}

input[type="submit"]:hover{
    background-color: rgb(3, 72, 3);
    cursor: pointer;
    padding-left: 1%;

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
    <h1 style="text-align: center;margin-top: 70px;">Mail Verification</h1> <br>
    <h3 style="text-align: center; margin-top: 10px;">Enter the OTP sent to your mail</h3>
    <center>
    <div class="form">
    <form action="" method="POST">
            <!-- <h1>Enter the OTP sent to your mail</h1> -->
        <input type="text" name="otp" id="otp">
        <p id="otperr" style="display:none;color:red;font-size:20px;font-weight:bolder;">
                "Invalid OTP"
        </p>
        <p>Didn't get the OTP ?? <br><a id="resend" href="">Resend</a></p>
        <!-- <a href="signup_three.html"><div title="next" class="next">&raquo; </div></a> <br><br> -->


    </center>
    <input id="submit" name="submit" type="submit" value="&raquo;">




    </form>









    <div class="join-us">
        <img src="../Source/Media/join-us.png" alt="">
    </div>

<div class="footer">
    &copy; 2023 Kitchen Kourier Pvt. Ltd.
</div>


</body>
</html>






<script>

    const submitButton = document.getElementById("submit");

    submitButton.addEventListener("click",function(event){
        event.preventDefault();

        const enteredOTP = Number(document.getElementById("otp").value);
        const otpError = document.getElementById("otperr");
        
        if(otp===enteredOTP){
            otpError.style.display="none";
            window.location = 'signup_three.php';

        }
        else{
            otpError.style.display = "block";


        }
    })


    const resend = document.getElementById("resend");
    resend.addEventListener("click",function(event){
        preventDefault("event");
        alert("The OTP has been sent again....")
        reload();
    })
</script>






   














