function validateEditUser() {
    var validation, uname, pass, mail;
    var username = document.forms["myForm"]["username"].value;
    if(username==""){
        uname = "username can't be empty";
        validation+= uname+"\n";
    }
    var password = document.forms["myForm"]["password"].value;
    if(password==""){
        uname = "password can't be empty";
        validation+= pass+"\n";
    }
    var email = document.forms["myForm"]["email"].value;
    if(email==""){
        uname = "username can't be empty";
        validation+= uname+"\n";
    }
}