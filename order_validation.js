
function orderValidation(){
    const senderName = document.getElementById("sender_name").value;
              
    const  senderEmail= document.getElementById("sender_email").value;
    const  senderPhone = document.getElementById("sender_phone").value;
    const  receiverName = document.getElementById("receiver_name").value;
    const  receiverPhone = document.getElementById("receiver_phone").value;
    const  deliveryTime = document.getElementById("delivery_time").value;
    const  pickupLocation= document.getElementById("loc1").value;
    const  pickupArea= document.getElementById("area1").value;
    const  nearestLandmark= document.getElementById("nearest_landmark").value;
    const  deliveryLocation= document.getElementById("loc2").value;
    const  deliveryArea= document.getElementById("area2").value;
    const  deliveryLandmark= document.getElementById("delivery_landmark").value;

    let regName = /[a-zA-Z]/;
    let regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let regPhone = /\d{10}/;

    let senderNameErr = document.getElementById('sender_name_error');
    let senderEmailErr = document.getElementById('sender_email_error');
    let senderPhoneErr  = document.getElementById('sender_phone_error');
    let receiverNameErr  = document.getElementById('receiver_name_error');
    let  receiverPhoneErr = document.getElementById('receiver_phone_error');
    let deliveryTimeErr = document.getElementById('delivery_time_error');
    let nearestLandmarkErr = document.getElementById('nearest_landmark_error');
    let deliveryLandmarkErr = document.getElementById('delivery_landmark_error');


    
    
    
    
    //if all the values are right , error message is not displayed
    if((regName.test(senderName) && senderName!="")){
    senderNameErr.style.display = "none";
    }
    if((regName.test(receiverName) && receiverName!="")){
        receiverNameErr.style.display = "none";
        }
    if(regEmail.test(senderEmail) && senderEmail!=""){
        senderEmailErr.style.display = "none";
    
    }
    
    if(regPhone.test(senderPhone) && senderPhone!=""){
          senderPhoneErr.style.display = "none";
    
    }

    if(regPhone.test(receiverPhone) && receiverPhone!=""){
        receiverPhoneErr.style.display = "none";
  
  }
    
  if(nearestLandmark!=""){
    nearestLandmarkErr.style.display = "none";
  }

  if(deliveryLandmark!=""){
    deliveryLandmarkErr.style.display = "none";
  }
    

  if(deliveryTime!=""){
    deliveryTimeErr.style.display = "none";
  }
  
    //if the values are not right , error messages are displayed
    //validating name 
    if(!(regName.test(senderName) && senderName!="")){
        senderNameErr.innerText = "Invalid Name";
        senderNameErr.style.display = "block";
        return false; 
    }

    if(!(regName.test(receiverName) && receiverName!="")){
        receiverNameErr.innerText = "Invalid Name";

        receiverNameErr.style.display = "block";
        return false; 
    }
    
    
    
    //validating email
    
    if(!(regEmail.test(senderEmail) && senderEmail!="")){
        senderEmailErr.innerText = "Invalid Email";

        senderEmailErr.style.display = "block"; 
        return false;
    }
    
    
    //validating phone
    
    if(!(regPhone.test(senderPhone) && senderPhone!="")){
        senderPhoneErr.innerText = "Invalid Phone";

        senderPhoneErr.style.display = "block";
        return false;
    }

    if(!(regPhone.test(receiverPhone) && receiverPhone!="")){
        receiverPhoneErr.innerText = "Invalid Phone";

        receiverPhoneErr.style.display = "block";
        return false;
    }
    

    //validating landmark

    if(nearestLandmark==""){
        nearestLandmarkErr.innerText = "Landmark can't be empty";

        nearestLandmarkErr.style.display = "block";
        return false;
    }


    if(deliveryLandmark==""){
        deliveryLandmarkErr.innerText = "Landmark can't be empty";

        deliveryLandmarkErr.style.display = "block";
        return false;
    }

   if(deliveryTime==""){
    deliveryTimeErr.innerText = "Time can't be Empty";
    deliveryTimeErr.style.display = "block";
    return false;
   }
    
    

        
    return true;










}