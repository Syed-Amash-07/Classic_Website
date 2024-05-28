function check(){

let firstname=document.getElementById("firstname").value;
let lname=document.getElementById("lastname").value;
let mail=document.getElementById("email").value;
let ph=document.getElementById("phone").value;
let usr=document.getElementById("username").value;


if(lname===""){
    alert("Please Enter Your Last Name");
    return false;
}
if(lname.length>8||lname.length<2){
    alert("Firstname should contain 2 to 8 letters");
    return false;
}
if(mail===""){
    alert("Please Enter you Email-id");
    return false;
}
if(mail.length>20){
    alert("email-id cannot contain 20 more letters!!");
    return false;
}
if(ph===""){
    alert("Please Enter you phone number");
    return false;
}
if((ph.length)>10 || (ph.length)<1 || ph[0]!='9'|| ph[0]=='8'|| ph[0]=='6'){
    alert("Invalid Phone Number !!!!");
    return false;
}
if(usr===""){
    alert("Username cannot be left empty !!!");
    return false;
}
if(usr.length>15||usr.length<6){
    alert("username should contain 5 to 10 letters");
    return false;
}



}