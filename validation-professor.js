function validateAddProfessor(){
    var validation="";
    var firstname = document.forms["add_professor"]["firstname"].value;
    if(firstname==""){
        validation+= "first name can't be empty\n";
    }
    var lastname = document.forms["add_professor"]["lastname"].value;
    if(lastname==""){
        validation+= "last name can't be empty\n";
    }
    var age = document.forms["add_professor"]["age"].value;
    var agePattern = new RegExp("^(2[89]|[3-5][0-9]|6[0-5])$");
    if(age!==""){
        if(agePattern.test(age)==false){
            validation+="age must be between is 28 and 65\n"
        }
    }else{
        validation+= "age can't be empty\n";
    }
    var subject = document.forms["add_professor"]["subject"].value;
    if(subject==""){
        validation+= "subject can't be empty\n";
    }
    var username = document.forms["add_professor"]["username"].value;
    var usernameRegx = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
    if(username!==""){
        if(usernameRegx.test(username)==false){
            validation+="Username format invalid\n";
        }
    }else{
        validation+= "username can't be empty\n";
    }
    var email = document.forms["add_professor"]["email"].value;
    var emailRegx = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailRegx.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["add_professor"]["password"].value;
    var passRegx = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passRegx.test(password)==false){
            validation+="Password format invalid\n"; //10chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        //alert("Professor added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}

function validateEditProfessor(){
    var validation="";
    var firstname = document.forms["edit_professor"]["firstname"].value;
    if(firstname==""){
        validation+= "first name can't be empty\n";
    }
    var lastname = document.forms["edit_professor"]["lastname"].value;
    if(lastname==""){
        validation+= "last name can't be empty\n";
    }
    var age = document.forms["edit_professor"]["age"].value;
    var agePattern = new RegExp("^(2[89]|[3-5][0-9]|6[0-5])$");
    if(age!==""){
        if(agePattern.test(age)==false){
            validation+="age must be between is 28 and 65\n"
        }
    }else{
        validation+= "age can't be empty\n";
    }
    var subject = document.forms["edit_professor"]["subject"].value;
    if(subject==""){
        validation+= "subject can't be empty\n";
    }
    var username = document.forms["edit_professor"]["username"].value;
    var usernameRegx = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
    if(username!==""){
        if(usernameRegx.test(username)==false){
            validation+="Username format invalid\n";
        }
    }else{
        validation+= "username can't be empty\n";
    }
    var email = document.forms["edit_professor"]["email"].value;
    var emailRegx = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailRegx.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["edit_professor"]["password"].value;
    var passRegx = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passRegx.test(password)==false){
            validation+="Password format invalid\n"; //10chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        //alert("Professor added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}