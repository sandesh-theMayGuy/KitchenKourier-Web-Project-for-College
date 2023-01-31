const menuButton = document.getElementById("menu");
const menuItems = document.getElementById("menu_items");
const divForMobile = document.getElementById("mobile")

const whyUs = document.getElementById("why_us");
const navbar = document.getElementById("nav");
const footer = document.getElementById("footer");


menuButton.addEventListener("click",function(){

    document.body.style.height = menuItems.style.height;

    if(menuItems.style.display=="none"){
    menuItems.style.display = "block";
    document.body.style.backgroundColor = "green";
    divForMobile.style.visibility = "hidden";
    whyUs.style.visibility = "hidden";
    document.body.style.overflowY = "hidden" 
    
    
    }
    else{
        menuItems.style.display = "none";
        document.body.style.backgroundColor = "white"
    divForMobile.style.visibility = "visible"
    whyUs.style.visibility = "visible";
    document.body.style.overflowY = "scroll"



    }
   
}) 

setInterval(function(){
    if(window.innerWidth>400){
        menuItems.style.display = "none";
        document.body.style.backgroundColor = "white"
    }
},1)

