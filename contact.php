
<?php


//contact form validation
$name = $email = $message="";
$Nameerr = $Emailerr = $Messageerr= "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //Name validation
    if (($_POST['name'])=="") {
        $Nameerr = "Name cant be empty";
    } else {
        $name = input_data($_POST['name']);
        if (!preg_match('/[a-zA-Z]\s[a-zA-Z]/', $name)) {
            $Nameerr = "name format mismatch";
            ?>
            <style>
                input[type="submit"]{
                    margin-left:30px;
                }
            </style>
            <?php
        }
    }
    //Email validation
    if (($_POST['email'])=="") {
        $Emailerr = "Email cant be empty";
    } else {
        $email = input_data($_POST["email"]);
        if (!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $email)) {
            $Emailerr = "email format mismatch";
        }
    }

    //Message validation
    if (($_POST['message'])=="") {
        $Messageerr = "Message empty";
    } 
    
 
}

function input_data($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="./script.js" defer></script>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./contact.css">
    <link rel="icon" href="./Media/kklogo_final.png">


    <script src="https://use.fontawesome.com/d1341f9b7a.js"></script>
    <script src="message_validation.js" defer ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Edu+TAS+Beginner:wght@700&family=Mochiy+Pop+One&family=Tinos&display=swap" rel="stylesheet">


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

</div>     

        </ul>
    </div>


 <br><br><br>

    <h1 style="text-align: center;">Contact Us</h1> <br><br>

    <div class="contact">
        <form action="" method="POST" onsubmit="return validate()">

            <input id="name" type="text" placeholder="Name" name="name">
            <p id="name_error" style="color:red;
    display: none;">Invalid name...Please Enter your full name</p>
    

             <br> <br> 
            <input id="email" type="email" placeholder="Email" name="email"> 
            <p id="email_error" style="color:red;
    display: none;">Invalid email...Please Enter your valid email</p>

           
            
            <br> <br>
            <input id="message" type="text" placeholder="Your Message" name="message">
            <p id="message_error" style="color:red;
    display: none;">Invalid message</p>

         
            <br> <br>
            <input id="submit" type="submit" name="submit"> 
        </form>
    </div>
 <br><br> <br>

    <h1 style="text-align: center;">Find Us On Socials</h1> <br>

    <div class="socials">

        <ul>
            <li><a href="https://www.facebook.com/san.desh.3557/" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
            <li><a href="https://www.instagram.com/the_mayguy/" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
            <li><a href="https://www.linkedin.com/in/sandesh-khatiwada-531388206/" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
            
            
            </ul>

    </div>

    <h1 style="text-align: center;">We are based on Balkumari, Lalitpur</h1>

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14133.726303876583!2d85.32999177156036!3d27.673053085740392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19ef0855a805%3A0xed63b3b2a275d029!2sBalkumari%20Bridge%2C%20Balkumari!5e0!3m2!1sen!2snp!4v1676556927488!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <br><br>


    <div class="footer">
        &copy; 2023 Kitchen Kourier Pvt. Ltd.
    </div>

    
</body>
</html>









<?php
   
include 'connect.php';


//Query the database (Insert form data)

if(isset($_POST["submit"])){


    if ($Nameerr == "" && $Emailerr == "" && $Phoneerr == "" && $Passworderr == "" && $CPassworderr == "")
    {
      

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];


$query = "INSERT INTO Messages values('$name' , '$email' , '$message');";

$result = mysqli_query($conn , $query);




}

    }



?>





