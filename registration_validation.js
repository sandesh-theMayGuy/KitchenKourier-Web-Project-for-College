

function validateOne(){
 


let regName = /[a-zA-Z]/;


let regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;



//Minimum eight characters, at least one letter, one number and one special character
let regPassword = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/; 



let name = document.getElementById('name').value;
let email = document.getElementById("email").value;
let password = document.getElementById("password").value;
let confirmPassword = document.getElementById("cpassword").value;


let nameError = document.getElementById("name_error");
let emailError = document.getElementById("email_error");
let passwordError = document.getElementById("password_error");
let cpasswordError = document.getElementById("cpassword_error");



//if all the values are right , error message is not displayed
if((regName.test(name) && name!="")){
nameError.style.display = "none";
}
if(regEmail.test(email) && email!=""){
    emailError.style.display = "none";

}

if(regPassword.test(password) && password!=""){
    passwordError.style.display = "none";

}

if(password==confirmPassword){
    cpasswordError.style.display = "none";
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

if(!(regPassword.test(password) && password!="")){
    passwordError.style.display = "block";
    return false;
}

if(password!=confirmPassword){
    cpasswordError.style.display = "block";
    return false;
}



const User={
    Name : name,
    Email : email,
}

    
return true;
}

