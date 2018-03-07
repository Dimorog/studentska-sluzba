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
        //alert("Subject added successfully");
        window.location.replace("http://www.studentskasluzba.local/subject-list.html");
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
        //alert("Subject added successfully");
        window.location.replace("http://www.studentskasluzba.local/subject-list.html");
    }else{
        alert(validation);
    }
}
//
function validateStudentSubject() {
    var points = document.forms["student_subject"]["points"].value;
    alert(points);
    var grade = "";
    switch(true){
        case(points<51):grade="F";break;
        case(points>=51 && points<60):grade="E";break;
        case(points>=60 && points<70):grade="D";break;
        case(points>=70 && points<80):grade="C";break;
        case(points>=80 && points<90):grade="B";break;
        case(points>=90 && points<=100):grade="A";break;
        default:alert("points must be between 1 and 100");break;
    }
    document.getElementById('grade').value = grade;
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
        //alert("Student added successfully");
        window.location.href = "student-list.html";
    }else{
        alert(validation);
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
        window.location.replace("http://www.studentskasluzba.local/subject-list.html");
    }else{
        alert(validation);
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
        //alert("Student added successfully");
        window.location.href = "https://www.example.com";
    }, 3000);
    }else{
        alert(validation);
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
        window.location.href = "student-list.html";
    }else{
        alert(validation);
    }

}