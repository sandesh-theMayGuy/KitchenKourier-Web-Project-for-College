<?php
include 'connect.php';


$query = "SELECT password from Users where email='khatiwadasandesh01@gmail.com' ";

$res = mysqli_query($conn,$query);

if($row=mysqli_fetch_assoc($res)){
    echo $row["password"];
}

if($row["password"]=="Ncit@123"){
    echo "Yes";
}




?>