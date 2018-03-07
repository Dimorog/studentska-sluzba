function validateEditUser() {
    var validation;
    var username = document.forms["myForm"]["username"].value;
    if(username==""){
        validation+= "username can't be empty\n";
    }
    var password = document.forms["myForm"]["password"].value;
    if(password==""){
        validation+= "password can't be empty\n";
    }
    var email = document.forms["myForm"]["email"].value;
    if(email==""){
        validation+= "email can't be empty\n";
    }
    if(validation==""){
        document.getElementById('status').innerText = "User edited successfully";
    }else{
        document.getElementById('status').innerText = validation;
    }
}

function validateStudentSubject() {
    var points = document.forms["myForm"]["points"].value;
    var grade;
    switch(points){
        case(points<51):grade="F";
        case(points>=51 && points<60):grade="E";
        case(points>=60 && points<70):grade="D";
        case(points>=70 && points<80):grade="C";
        case(points>=80 && points<90):grade="B";
        case(points>=90 && points<=100):grade="A";
    }
    document.getElementById("grade").innerText = grade;
}

function validateLogin(){
    var validation;
    var email = document.forms["myForm"]["email"].value;
    if(email==""){
        validation+= "username can't be empty\n";
    }
    var password = document.forms["myForm"]["password"].value;
    if(password==""){
        validation+= "password can't be empty\n";
    }

    if(validation==""){
        document.getElementById('status').innerText = "Login successful";
    }else{
        document.getElementById('status').innerText = validation;
    }
}