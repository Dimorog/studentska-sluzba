function validateLogin(){
    var validation = "";
    var email = document.forms["login"]["email"].value;
    var emailRegx = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailRegx.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["login"]["password"].value;
    var passRegx = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passRegx.test(password)==false){
            validation+="Password format invalid\n"; //10chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        //alert("Login successful");
        return true;
    }else{
        alert(validation);
        return false;
    }

}

function validateAddUser() {
    var validation = "";
    var username = document.forms["add_user"]["username"].value;
    var usernameRegx = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
    if(username!==""){
        if(usernameRegx.test(username)==false){
            validation+="Username format invalid\n";
        }
    }else{
        validation+= "username can't be empty\n";
    }
    var email = document.forms["add_user"]["email"].value;
    var emailRegx = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailRegx.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["add_user"]["password"].value;

    var passRegx = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passRegx.test(password)==false){
            validation+="Password format invalid\n"; //10chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }

    if(validation==""){
        alert("User added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }

}

function validateEditUser() {
    var validation= "";
    var username = document.forms["edit_user"]["username"].value;
    var usernameRegx = new RegExp("^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$");
    if(username!==""){
        if(usernameRegx.test(username)==false){
            validation+="Username format invalid\n";
        }
    }else{
        validation+= "username can't be empty\n";
    }
    var email = document.forms["edit_user"]["email"].value;
    var emailRegx = new RegExp("^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");
    if(email!==""){
        if(emailRegx.test(email)==false){
            validation+="Email format invalid\n";
        }
    }else{
        validation+= "email can't be empty\n";
    }
    var password = document.forms["edit_user"]["password"].value;
    var passRegx = new RegExp("^(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{4,12}$");
    if(password!==""){
        if(passRegx.test(password)==false){
            validation+="Password format invalid\n"; //10chars,1 lowercase, 1 uppercase and a number
        }
    }else{
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        //alert("User edited successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}

function validateAddSubject() {
    var validation = "";
    var name = document.forms["add_subject"]["name"].value;
    if(name==""){
        validation+= "name can't be empty.\n";
    }
    var ecdl = document.forms["add_subject"]["ecdl"].value;
    if(ecdl!==""){
        if(ecdl<2 || ecdl>20){
            validation+= "ecdl must be between 2 and 20.\n";
        }
    }else{
        validation+= "ecdl can't be empty.\n";
    }

    var description = document.forms["add_subject"]["description"].value;
    if(description==""){
        validation+= "description can't be empty.\n";
    }
    if(validation==""){
        alert("Subject added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}

function validateEditSubject() {
    var validation = "";
    var name = document.forms["edit_subject"]["name"].value;
    if(name==""){
        validation+= "name can't be empty.\n";
    }
    var ecdl = document.forms["edit_subject"]["ecdl"].value;
    if(ecdl!==""){
        if(ecdl<2 || ecdl>20){
            validation+= "ecdl must be between 2 and 20.\n";
        }
    }else{
        validation+= "ecdl can't be empty.\n";
    }
    var description = document.forms["edit_subject"]["description"].value;
    if(description==""){
        validation+= "description can't be empty.\n";
    }
    if(validation==""){
        //alert("Subject added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}

function validateAddStudent() {
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
    if(validation==""){
        alert("Student added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }

}

function validateEditStudent() {
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
    if(validation==""){
        //alert("Student added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }
}

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
    if(validation==""){
        alert("Professor added successfully");
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
    if(validation==""){
        //alert("Student added successfully");
        return true;
    }else{
        alert(validation);
        return false;
    }

}