function validateLogin(){
    var validation = "";
    var email = document.forms["login"]["email"].value;
    if(email==""){
        validation+= "email can't be empty\n";
    }
    var password = document.forms["login"]["password"].value;
    if(password==""){
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        alert("Login successful");
    }else{
        alert(validation);
    }

}

function validateAddUser() {
    var validation = "";
    var username = document.forms["add_user"]["username"].value;
    if(username==""){
        validation+= "username can't be empty\n";
    }
    var email = document.forms["add_user"]["email"].value;
    if(email==""){
        validation+= "email can't be empty\n";
    }
    var password = document.forms["add_user"]["password"].value;
    if(password==""){
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        alert("User added successfully");
    }else{
        alert(validation);
    }
}

function validateEditUser() {
    var validation= "";
    var username = document.forms["edit_user"]["username"].value;
    if(username==""){
        validation+= "username can't be empty\n";
    }
    var email = document.forms["edit_user"]["email"].value;
    if(email==""){
        validation+= "email can't be empty\n";
    }
    var password = document.forms["edit_user"]["password"].value;
    if(password==""){
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        alert("User edited successfully");
    }else{
        alert(validation);
    }
}

function validateAddStudent() {
    var validation;
    var username = document.forms["edit_user"]["username"].value;
    if(username==""){
        validation+= "username can't be empty\n";
    }
    var email = document.forms["edit_user"]["email"].value;
    if(email==""){
        validation+= "email can't be empty\n";
    }
    var password = document.forms["edit_user"]["password"].value;
    if(password==""){
        validation+= "password can't be empty\n";
    }
    if(validation==""){
        alert("User edited successfully");
    }else{
        alert(validation);
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
    }else{
        alert(validation);
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
        alert("Subject added successfully");
    }else{
        alert(validation);
    }
}
//
// function validateStudentSubject() {
//     var points = document.forms["myForm"]["points"].value;
//     var grade;
//     switch(points){
//         case(points<51):grade="F";
//         case(points>=51 && points<60):grade="E";
//         case(points>=60 && points<70):grade="D";
//         case(points>=70 && points<80):grade="C";
//         case(points>=80 && points<90):grade="B";
//         case(points>=90 && points<=100):grade="A";
//     }
//     document.getElementById("grade").innerText = grade;
// }
