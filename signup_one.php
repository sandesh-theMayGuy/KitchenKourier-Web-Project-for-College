<?php
    

include 'connect.php';






//validation name, email , password and confirm password
$name = $email = $password=$cpassword="";

$Nameerr = $Emailerr = $Passworderr=$Cpassworderr= "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //Name validation
    if (($_POST['name'])=="") {
        $Nameerr = "Name cant be empty";
    } else {
        $name = input_data($_POST['name']);
        if (!preg_match('/[a-zA-Z]/', $name)) {
            $Nameerr = "name format mismatch";
          
        }
    }
    //Email validation


    $mail = $_POST['email'];
    $query = "SELECT * from Users where email='$mail';";
    $res = mysqli_query($conn,$query);
    $rows = mysqli_num_rows($res);

    if($rows>0){
        echo "<script>";
        echo "alert('This email is already registered...Please Log In to Continue')";
        echo "</script>";
        $Emailerr = "Email already registered"; 
    }



    

    if (($_POST['email'])=="") {
        $Emailerr = "Email cant be empty";
    }  else {


      
   


        $email = input_data($_POST["email"]);
        if (!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $email)) {
            $Emailerr = "email format mismatch";
        
    }
    }

    //Password validation
    if (($_POST['password'])=="") {
        $Passworderr = "Password empty";
    } else{
        $password = input_data($_POST["password"]);
        if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',$password)){
            $Passworderr = "password format mismatch";
        }
    }


    //Confirm Password Validation

    if($_POST["password"]!=input_data($_POST["cpassword"])){
        $Cpassworderr = "Confirm Password and Password donot match";
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



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./signup_one.css">
    <link rel="icon" href="./Media/kklogo_final.png">

    <script src="./script.js" defer></script>
    <script src="registration_validation.js" defer></script>



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

}

input[type="submit"]:hover{
    background-color: rgb(3, 72, 3);
    cursor: pointer;
    padding-left: 1%;

} 
    </style>



    <title>Sign Up</title>
   

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

        <div class="form">
        <form action="" method="POST" onsubmit="return validateOne();">

            <label for="name">Name:</label> <br><input id="name" name="name" type="text"> <br> <p style="color:red; display:none;" id="name_error">Invalid name format <br><br> </p> 
            <label for="email">Email:</label> <br><input id="email" name="email" type="email"> <br> <p style="color:red; display:none;" id="email_error">Invalid email format <br><br> </p> 
            <label for="password">Create a Password: </label> <br> <input id="password" name="password" type="password"> <br> <p style="color:red;display:none;" id="password_error">Password should be at least 8 <br> characters long and must contain <br> letter,number and special characters <br><br> </p> 
            <label for="cpassword">Confirm Password : </label> <br> <input id="cpassword" name="cpassword" type="password"> <br> <p style="color:red;display:none;" id="cpassword_error">Password and Confirm Password <br> do not match <br><br> </p> 

        </div> 

        <!-- <a href="signup_two.html"><div title="next" class="next">&raquo; </div></a><br><br> -->

        <input id="submit" type="submit" name="submit" value="&raquo;">

            

            <hr class="hr-text" data-content="OR">

            <p style="text-align: center;">Already Have an Account ?</p>
          
            <a href="./login.php" style="margin-left: 48%;" id="log-in">Log In</a>


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





   







if(isset($_POST["submit"])){


if ($Nameerr == "" && $Emailerr == "" && $Passworderr == "" && $CPassworderr == "")
{
  
    
    
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

























    session_start();



    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    $_SESSION["name"] = $name;
 
    

    header('Location:signup_two.php');
    exit();













}

    }






?>


























