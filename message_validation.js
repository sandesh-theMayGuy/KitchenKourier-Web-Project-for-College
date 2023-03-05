let submitBtn = document.getElementById("submit");

function validate(){

let regName = /[a-zA-Z]\s[a-zA-Z]/;


let regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

let regMessage = /[a-zA-Z]\d*/; 



let name = document.getElementById('name').value;
let email = document.getElementById("email").value;
let message = document.getElementById("message").value;


let nameError = document.getElementById("name_error");
let emailError = document.getElementById("email_error");
let messageError = document.getElementById("message_error");




//if all the values are right , error message is not displayed
if((regMessage.test(message) && message!="")){
messageError.style.display = "none";
}
if(regName.test(name) && name!=""){
    nameError.style.display = "none";

}

if(regEmail.test(email) && email!=""){
    emailError.style.display = "none";

}

//if the values are not right , error messages are displayed
//validating name 
if(!(regName.test(name) && name!="")){
    nameError.style.display = "block";
    return false;
}



//validating email

if(!(regEmail.test(email) && email!="")){
    emailError.style.display = "block"; 
    return false;
}

//validating message

if(!(regMessage.test(message) && message!="")){
    messageError.style.display = "block";
    return false;
}


alert("Message has been sent succesfully...");

return true;
}
