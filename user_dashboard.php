
<?php


include 'connect.php';

session_start();





$senderNameErr= $receiverNameErr = $emailErr=$senderPhoneErr=$receiverPhoneErr=$timeErr=$senderLandmarkErr=$receiverLandmarkErr="";

$senderName= $senderEmail = $senderPhone = $receiverName = $receiverPhone = $deliveryTime = $pickupLoc = $pickupArea=$nearestLandmark = $deliveryLoc = $deliveryArea = $deliveryLandmark = "";





if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //Name validation
    if (($_POST['sender_name'])=="") {
        $senderNameErr = "Name cant be empty";
    } else {
        $senderName = input_data($_POST['sender_name']);
        if (!preg_match('/[a-zA-Z]/', $senderName)) {
            $senderNameErr = "name format mismatch";
        }
    }

    if (($_POST['receiver_name'])=="") {
        $receiverNameErr = "Name cant be empty";
    } else {
        $receiverName = input_data($_POST['receiver_name']);
        if (!preg_match('/[a-zA-Z]/', $receiverName)) {
            $receiverNameErr = "name format mismatch";
        }
    }

 
}


  //Email validation


  $senderEmail = $_POST['sender_email'];



  

  if (($_POST['sender_email'])=="") {
      $emailErr = "Email cant be empty";
  }  else {


    
 


      $senderEmail = input_data($_POST["sender_email"]);
      if (!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $senderEmail)) {
          $emailErr = "email format mismatch";
      
  }
  }

  //landmark validation
  if (($_POST['nearest_landmark'])=="") {
      $senderLandmarkErr = "Value Empty";
  } 

  if($_POST["delivery_landmark"]==""){
      $receiverLandmarkErr = "Value Empty";
  }


  //phone no. validation

  if (($_POST['sender_phone'])=="") {
    $senderPhoneErr = "Phone cant be empty";
}  else {

    $senderPhone = input_data($_POST["sender_phone"]);
    if (!preg_match('/\d{10}/', $senderPhone)) {
        $senderPhoneErr = "Phone format mismatch"; 
}


if (($_POST['receiver_phone'])=="") {
    $receiverPhoneErr = "Phone cant be empty";
}  else {

    $receiverPhone = input_data($_POST["receiver_phone"]);
    if (!preg_match('/\d{10}/', $receiverPhone)) {
        $receiverPhoneErr = "Phone format mismatch"; 
}

}



if (($_POST['delivery_time'])=="") {
    $timeErr = "Time be empty";
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


<?php
if (isset($_GET['log_out'])) {
    // code to execute after log out
    session_start();

    unset($_SESSION['username']);
    unset($_SESSION['useremail']);

    session_destroy();

    header('Location:index.html');
    exit();
    
  }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KitchenKourier-Enjoy Homecooked Food even at Work</title>
    <link rel="icon" href="./Media/kklogo_final.png">

    <link rel="stylesheet" href="./user.css">

 




<style>
    .error{
        display:none;
    }
</style>

<script src="./order_validation.js" defer></script>




</head>
<body>
    <div class="nav">
    <ul>
            <li><a href="./user_dashboard.php"><img id="logo" src="./Media/kklogo_final.png" alt=""></a></li>
            <div id="trademark_text">Enjoy Homecooked Food Event at Work</div>
           
            <li>
                <div class="dropdown">
                      <button id="opt" class="dropbtn">Options &darr;</button>
                      <div class="dropdown-content">
                        <a id="log_out" href="user_dashboard.php?log_out=true">Log Out &#x279A;</a>
                      </div>
                </div>
            </li>


        </ul>
     </div>


     <div id="order_form" >

        <form action="" method="POST" onsubmit="return orderValidation();">
        <h1>Place an Order</h1> <br><br>

                <h2>Sender Information</h2> <br><img id="sender_img" src="./Media/user_icon.jpg" alt=""> <br>
                Name <br><input name="sender_name" id="sender_name" type="text" value="<?php echo $_SESSION["username"]  ?>"> <p id="sender_name_error" class="error" style="color:red"> </p> <br><br> 
                Email <br><input name="sender_email" id="sender_email" type="email" value="<?php echo $_SESSION["useremail"] ?>"> <br> <br>  <p id="sender_email_error" class="error" style="color:red"></p>
                Phone <br><input name="sender_phone" id="sender_phone" type="number"> <br> (you'll get a call for order confirmation)  <p id="sender_phone_error" class="error" style="color:red"> </p>

                <br><br><br> <hr> <br>

                <h2>Receiver Information</h2> <br> <img id="receiver_img" src="./Media/user_icon.jpg" alt=""> <br>
                Name <br> <input type="text" name="receiver_name" id="receiver_name"> <p id="receiver_name_error" class="error" style="color:red"></p> <br><br>
                Phone <br><input name="receiver_phone" type="number" id="receiver_phone"> <br> (receiver will get a call after delivery) <br> <br> <br><p id="receiver_phone_error" class="error" style="color:red"> </p> <hr> <br>

                <h3> Delivery Time (10AM to 4PM)</h3> (the time you wish the food to be delivered) <br><br> <input name="delivery_time" id="delivery_time" type="time" min="10:00" max="16:00"> <p id="delivery_time_error" class="error" style="color:red"></p>
 <br><br><br> <hr> <br> 
                <h3>Payment Method</h3><br> <select name="payment_method" id="">
                    <option value="COD">Cash On Delivery</option>
                </select>

                <br><br><br> <hr> <br> 

                <h3>Pickup Location : </h3> <img class="location_img" src="./Media/location.png" alt=""> <br>
                

                <br><h5>Location</h5>
                <select  name="pickup_location" id="loc1">
                  <option selected value="Kathmandu Area">Kathmandu Area</option>
                  <option value="Bhaktapur Area">Bhaktapur Area</option>
                  <option value="Banepa Area">Banepa Area</option>
                  <option value="Panauti Area">Panauti Area</option>
                  <option value="Lalitpur Inside Ring Road">Lalitpur Inside Ring Road</option>
                  <option value="Lalitpur Outside Ring Road">Lalitpur Outside Ring Road</option>
                </select>

                <br><br><h5>Area</h5>

                <select name="pickup_area" id="area1"></select>


                <br><br><h5>Nearest Landmark(Eg:Office, School)</h5> 
               &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="nearest_landmark" id="nearest_landmark"><span style="color:blue; font-size:30px;position:relative;top:8px; cursor:pointer;" title="Nearest Offices/Schools or any popular location from your home/pickup location"> &#9432;</span> <p id="nearest_landmark_error" class="error" style="color:red"></p>
     


           
               
            <br><br>
                <h3>Delivery Location : </h3>  <img class="location_img" src="./Media/location.png" alt=""> <br>
                <br><h5>Location</h5>
                <select name="delivery_location" id="loc2">
                  <option selected value="Kathmandu Area">Kathmandu Area</option>
                  <option value="Bhaktapur Area">Bhaktapur Area</option>
                  <option value="Banepa Area">Banepa Area</option>
                  <option value="Panauti Area">Panauti Area</option>
                  <option value="Lalitpur Inside Ring Road">Lalitpur Inside Ring Road</option>
                  <option value="Lalitpur Outside Ring Road">Lalitpur Outside Ring Road</option>
                </select>

                <br><br><h5>Area</h5>

                <select name="delivery_area" id="area2"></select>


                <br><br><h5>Landmark(Eg:Office, School)</h5>
                &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="delivery_landmark" id="delivery_landmark"><span style="color:blue; font-size:30px;position:relative;top:8px; cursor:pointer;" title="Exact office/School or any location where the food is to be delivered"> &#9432;</span>  <p id="delivery_landmark_error" class="error" style="color:red"></p>
        
                <br><br><br><br>
                <input name="submit" type="submit">




        </form>
     </div>

     <br><br><br>




  
    <div class="footer" id="footer">
        &copy; 2023 Kitchen Kourier Pvt. Ltd.


    </div>



</body>
</html>

   
<script>
const bhaktapurArea = [
"Balkot Area",
"Biruwa Buspark Area",
"Bode Area",
"Duwakot Area",
"Gatthaghar Area",
"Jagati Area",
"Kamalbinayak Area",
"Katunje Area",
"Kaushaltar Area",
"Kharipati Area",
"Lokanthali Area",
"Naya Thimi Area",
"Purano Thimi Area",
"Palanse Area",
"Sallaghari Area",
"Sano Thimi Area",
"Sirutar Area",
"Suryabinayak Area",
];

const banepaArea = [
    "28 Kilo Area",
    "Banepa Chowk Area",
    "Bashghari Area",
    "Bhiasepati Area",
    "Budol Area",
    "Chandeshwori Temple Area",
    "Dhulikhel Area",
    "KU Area",
    "Nala Area",
    "Nayabasti Area",
    "Sanga Area",
    "Ugratara Jangal Busstop Area",
    "Tindobato Area",

];

const panautiArea = [
    "Panauti Municipality office Area",
    "Panauti Museum Area",
    "Wolachhen Bagaichha Area",

];

const kathmanduArea=[
    "Kathmandu Metro 10 New Baneshwor Area",
    "Kathmandu Metro 11 Maitighar Area",
    "Kathmandu Metro 12 Teku Area",
    "Kathmandu Metro 13 Kalimati Area",
    "Kathmandu Metro 14 Kuleshwor Area",
    "Kathmandu Metro 15 Swayambhu Area",
    "Kathmandu Metro 16 Nayabazar Area",
    "Kathmandu Metro 17 Chhetrapati Area",
    "Kathmandu Metro 18 Raktakali Area",
    "Kathmandu Metro 19 HanumanDhoka Area",
    "Kathmandu Metro 1 Naxal Area",
    "Kathmandu Metro 20 Marutol Area",
    "Kathmandu Metro 21 Lagantol Area",
    "Kathmandu Metro 22 New Road Area",
    "Kathmandu Metro 23 Basantapur Area",
    "Kathmandu Metro 24 Indrachowk Area",
    "Kathmandu Metro 25 Ason Area",
    "Kathmandu Metro 26 Sanakhushi Area",
    "Kathmandu Metro 27 Bhotahiti Area",
    "Kathmandu Metro 28 Bagbazar Area",
    "Kathmandu Metro 29 Anamnagar Area",
    "Kathmandu Metro 2 Lazimpat Area",
    "Kathmandu Metro 30 Maitidevi Area",
    "Kathmandu Metro 31 Minbhawan Area",
    "Kathmandu Metro 32 Koteshwor Area",
    "Kathmandu Metro 32 Tinkune Area",
    "Kathmandu Metro 3 Baluwatar Area",
    "Kathmandu Metro 4 Bishalnagar Area",
    "Kathmandu Metro 5 Tangal Area",
    "Kathmandu Metro 7 Chabahil Area",
    "Kathmandu Metro 8 Gaushala Area",
    "Kathmandu Metro 9 Sinamangal Area",

];

const lalitpurInsideRingRoadArea=[
    "Chakupat Area",
    "Banglamukhi Area",
    "Thaina Area",
    "Kusunti Area",
    "Lagankhel Area",
    "Satdobato Area",
    "Mangalbazar Area",
    "Gwarko Area",
    "Machhindrabahal Area",
    "Kupandol Area",
    "Patandhoka Area",
    "Jhamsikhel Area",
    "Kalopul Area",
    "Sanepa Area",
    "Pulchowk Area",
    "Jawalakhel Area",
    "Kumaripati Area",
    "Patan Hospital Area",
    "Kanibahal Area",
    "Sundhara Area",
    "Guitole Area",
    "Balkumari Area",
    "Chyasal Area"
]

const lalitpurOutsideRingRoadArea = [
    "Godawari- Bajrabarahi Area",
    "Godawari- Botanical Garden Area",
    "Godawari - Jharuwarasi",
    "Godawari- Thaiba",
    "Godawari- Thecho",
    "Karyabinayak- Chhampi",
    "Karyabinayak- Chunikhel",
    "Karyabinayak - Dhaichhap",
    "Karyabinayak - Kokhana",
    "Bhaisepati",
    "Bungamati",
    "Chokhel Area",
    "Dhapakhel Area",
    "Dholahiti",
    "Harisiddhi Patan Area",
    "Imadole Area",
    "Loha Chowk",
    "Nakhipot Area",
    "Nakhipot Kantipur Colony",
    "Nakhu Area",
    "Ranibu Area",
    "Sanepa Indrayani Mandir",
    "Sunakoti Area",
    "Changathali Area",
    "Lamatar Bus Stop Area",
    "Lubu",
    "Tikathali"
]


let loc1 = document.getElementById("loc1");
let area1 = document.getElementById("area1");
let loc2 = document.getElementById("loc2");
let area2 = document.getElementById("area2");


for(let value of kathmanduArea){
     
     let option = document.createElement("option");
     option.innerText = value;
     option.setAttribute("value",value);
     area1.appendChild(option);
 
}


for(let value of kathmanduArea){
     
     let option = document.createElement("option");
     option.innerText = value;
     option.setAttribute("value",value);
     area2.appendChild(option);
}

loc1.addEventListener("input",function(){


    if(loc1.value=="Kathmandu Area"){
        var child = area1.lastElementChild; 
        while (child) {
            area1.removeChild(child);
            child = area1.lastElementChild;
        }

        for(let value of kathmanduArea){
     
        let option = document.createElement("option");
        option.innerText = value;
        option.setAttribute("value",value);
        area1.appendChild(option);
        }
    }

    if(loc1.value=="Bhaktapur Area"){
        var child = area1.lastElementChild; 
        while (child) {
            area1.removeChild(child);
            child = area1.lastElementChild;
        }


        for(let value of bhaktapurArea){
        let option = document.createElement("option");
        option.innerText = value;
        option.setAttribute("value",value);
        area1.appendChild(option);
        }
    }

    if(loc1.value=="Banepa Area"){
        var child = area1.lastElementChild; 
        while (child) {
            area1.removeChild(child);
            child = area1.lastElementChild;
        }


        for(let value of banepaArea){
        let option = document.createElement("option");
        option.innerText = value;
        option.setAttribute("value",value);
        area1.appendChild(option);
        }
    }

    if(loc1.value=="Panauti Area"){
        var child = area1.lastElementChild; 
        while (child) {
            area1.removeChild(child);
            child = area1.lastElementChild;
        }


        for(let value of panautiArea){
        let option = document.createElement("option");
        option.innerText = value;
        option.setAttribute("value",value);
        area1.appendChild(option);
        }
    }


    if(loc1.value=="Lalitpur Inside Ring Road"){
        var child = area1.lastElementChild; 
        while (child) {
            area1.removeChild(child);
            child = area1.lastElementChild;
        }


        for(let value of lalitpurInsideRingRoadArea){
        let option = document.createElement("option");
        option.innerText = value;
        option.setAttribute("value",value);
        area1.appendChild(option);
        }
    }

    if(loc1.value=="Lalitpur Outside Ring Road"){
        var child = area1.lastElementChild; 
        while (child) {
            area1.removeChild(child);
            child = area1.lastElementChild;
        }


        for(let value of lalitpurOutsideRingRoadArea){
        let option = document.createElement("option");
        option.innerText = value;
        option.setAttribute("value",value);
        area1.appendChild(option);
        }
    }


    
});






loc2.addEventListener("input",function(){


if(loc2.value=="Kathmandu Area"){
    var child = area2.lastElementChild; 
    while (child) {
        area2.removeChild(child);
        child = area2.lastElementChild;
    }

    for(let value of kathmanduArea){
 
    let option = document.createElement("option");
    option.innerText = value;
    option.setAttribute("value",value);
    area2.appendChild(option);
    }
}

if(loc2.value=="Bhaktapur Area"){
    var child = area2.lastElementChild; 
    while (child) {
        area2.removeChild(child);
        child = area2.lastElementChild;
    }


    for(let value of bhaktapurArea){
    let option = document.createElement("option");
    option.innerText = value;
    option.setAttribute("value",value);
    area2.appendChild(option);
    }
}

if(loc2.value=="Banepa Area"){
    var child = area2.lastElementChild; 
    while (child) {
        area2.removeChild(child);
        child = area2.lastElementChild;
    }


    for(let value of banepaArea){
    let option = document.createElement("option");
    option.innerText = value;
    option.setAttribute("value",value);
    area2.appendChild(option);
    }
}

if(loc2.value=="Panauti Area"){
    var child = area2.lastElementChild; 
    while (child) {
        area2.removeChild(child);
        child = area2.lastElementChild;
    }


    for(let value of panautiArea){
    let option = document.createElement("option");
    option.innerText = value;
    option.setAttribute("value",value);
    area2.appendChild(option);
    }
}


if(loc2.value=="Lalitpur Inside Ring Road"){
    var child = area2.lastElementChild; 
    while (child) {
        area2.removeChild(child);
        child = area2.lastElementChild;
    }


    for(let value of lalitpurInsideRingRoadArea){
    let option = document.createElement("option");
    option.innerText = value;
    option.setAttribute("value",value);
    area2.appendChild(option);
    }
}

if(loc2.value=="Lalitpur Outside Ring Road"){
    var child = area2.lastElementChild; 
    while (child) {
        area2.removeChild(child);
        child = area2.lastElementChild;
    }


    for(let value of lalitpurOutsideRingRoadArea){
    let option = document.createElement("option");
    option.innerText = value;
    option.setAttribute("value",value);
    area2.appendChild(option);
    }
}



})

</script>




<?php

if(isset($_POST["submit"])){


if ($senderNameErr==""&& $receiverNameErr =="" && $emailErr=="" && $senderPhoneErr=="" && $receiverPhoneErr=="" && $timeErr=="" && $senderLandmarkErr== "" && $receiverLandmarkErr=="")
    {
      
        
        
    $senderName = $_POST["sender_name"];
    $senderEmail = $_POST["sender_email"];
    $senderPhone = $_POST["sender_phone"];
    $receiverName = $_POST["receiver_name"];
    $receiverPhone = $_POST["receiver_phone"];
    $deliveryTime = $_POST["delivery_time"];
    $pickupLoc = $_POST['pickup_location'];
    $pickupArea = $_POST["pickup_area"];
    $nearestLandmark = $_POST["nearest_landmark"];
    $deliveryLoc = $_POST["delivery_location"];
    $deliveryArea = $_POST["delivery_area"];
    $deliveryLandmark = $_POST["delivery_landmark"];
  
    
    


$query = "INSERT INTO Orders values('$senderName','$senderEmail','$senderPhone','$receiverName','$receiverPhone','$deliveryTime','$pickupLoc','$pickupArea','$nearestLandmark','$deliveryLoc','$deliveryArea','$deliveryLandmark')";
$res = mysqli_query($conn,$query);

if($res){

    echo "<script>";
    echo 'alert("Order has been placed Succesfully...You will get a call from our CSR anytime soon...")';
    echo "</script>";

}

else{
   echo "<script>";
   echo 'alert("Could not Place Order...Try Again ");';
   echo "</script>";
}
    
    
    }
    
        }
    
    
    
    
    


    ?>
    
    
    
    
    
    
