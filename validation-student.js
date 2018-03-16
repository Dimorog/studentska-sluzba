function validateAddStudent() {
    //check if entered data is empty or in invalid format.
    //if data is not valid alert user
    //return true or false
    var validation="";
    var firstname = document.forms["add_student"]["firstname"].value;
    if(firstname==""){
        validation+= "first name can't be empty\n";
    }
    var lastname = document.forms["add_student"]["lastname"].value;
    if(lastname==""){
        validation+= "last name can't be empty\n";
    }
    var index = document.forms["add_student"]["index"].value;
    var indexPattern = new RegExp("^\\d{2,3}-\\d{2}$");
    if(index!==""){
        if(indexPattern.test(index)==false){
            validation+="index format is not correct\n"
        }
    }else{
        validation+= "index can't be empty\n";
    }
    var birthdate = document.forms["add_student"]["birth_date"].value;
    var bdPattern = new RegExp("^([12]\\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\\d|3[01]))")
    if(birthdate!==""){
        if(bdPattern.test(birthdate)==false){
            validation+="birthdate format is not correct\n"
        }
    }else{
        validation+= "birthdate can't be empty\n";
    }
    var course = document.forms["add_student"]["course"].value;
    if(course==""){
        validation+= "course can't be empty\n";
    }
    var username = document.forms["add_student"]["username"].value;
    var usernameRegx = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
    if(username!==""){
        if(usernameRegx.test(username)==false){
            validation+="Username format invalid\n";
        }
    }else{
        validation+= "username can't be empty\n";
    }
    //USer
    var email = document.forms["add_student"]["email"].value;
    var emailRegx = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailRegx.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["add_student"]["password"].value;

    var passRegx = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passRegx.test(password)==false){
            validation+="Password format invalid\n"; //10chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        alert("Student added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }

}

function validateEditStudent() {
    //check if entered data is empty or in invalid format.
    //if data is not valid alert user
    //return true or false
    var validation="";
    var firstname = document.forms["edit_student"]["firstname"].value;
    if(firstname==""){
        validation+= "first name can't be empty\n";
    }
    var lastname = document.forms["edit_student"]["lastname"].value;
    if(lastname==""){
        validation+= "last name can't be empty\n";
    }
    var index = document.forms["edit_student"]["index"].value;
    var indexPattern = new RegExp("^\\d{2,3}-\\d{2}$");
    if(index!==""){
        if(indexPattern.test(index)==false){
            validation+="index format is not correct\n"
        }
    }else{
        validation+= "index can't be empty\n";
    }
    var birthdate = document.forms["edit_student"]["birth_date"].value;
    if(birthdate==""){
        validation+= "birthdate can't be empty\n";
    }
    var course = document.forms["edit_student"]["course"].value;
    if(course==""){
        validation+= "course can't be empty\n";
    }
    var username = document.forms["edit_student"]["username"].value;
    var usernameRegx = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
    if(username!==""){
        if(usernameRegx.test(username)==false){
            validation+="Username format invalid\n";
        }
    }else{
        validation+= "username can't be empty\n";
    }
    //USer
    var email = document.forms["edit_student"]["email"].value;
    var emailRegx = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailRegx.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["edit_student"]["password"].value;

    var passRegx = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passRegx.test(password)==false){
            validation+="Password format invalid\n"; //10chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        //alert("Student added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}