const usernameinput = document.getElementById("username")
let errorusernamediv = document.createElement("div")
errorusernamediv.classList.add("alert", "alert-danger")
let inputdiv = document.getElementsByClassName("form-group")
let successusernamediv = document.createElement("div")
successusernamediv.classList.add("alert","alert-success")
successusernamediv.innerHTML="username available"
const checkcorrectuser = () =>{
    username = usernameinput.value
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){ 
        if(this.readyState ==4 &&this.status == 200&&username!=""){
            if(this.responseText != ""){
                successusernamediv.remove()
                errorusernamediv.innerHTML = this.responseText;
                inputdiv[0].after(errorusernamediv)
            }
            else{
                errorusernamediv.remove()
                inputdiv[0].after(successusernamediv)
            }
        }
        else{
            errorusernamediv.remove()
            successusernamediv.remove()
        }
    }


    xhttp.open("GET","./check.php?username="+username,true)
    xhttp.send()
}
usernameinput.addEventListener("keyup",checkcorrectuser)


// -------------for email ----------------

const emailinput = document.getElementById("email")
let erroremaildiv = document.createElement("div")
erroremaildiv.classList.add("alert", "alert-danger")
let successemaildiv = document.createElement("div")
successemaildiv.classList.add("alert","alert-success")
successemaildiv.innerHTML="email available"

const checkcorrectemail = ()=>{
    let email = emailinput.value
    var xml = new XMLHttpRequest()
    xml.onreadystatechange = function(){
        if(this.readyState ==4 && this.status == 200 &&email!=""){
            if(this.responseText != ""){
                successemaildiv.remove()
                erroremaildiv.innerHTML = this.responseText;
                inputdiv[1].after(erroremaildiv)
            }
            else{
                erroremaildiv.remove()
                inputdiv[1].after(successemaildiv)
            }
        }
        else{
            erroremaildiv.remove()
            successemaildiv.remove()
        }
    }

    xml.open("GET","./check.php?email="+email,true)
    xml.send()
}
emailinput.addEventListener("keyup",checkcorrectemail)


// ------------- for phone number ------------------------------

let phoneinput = document.getElementById("phone")
let errorphonediv = document.createElement("div")
errorphonediv.classList.add("alert", "alert-danger")
errorphonediv.innerHTML = "incorrect phonenumber format"

const checkcorrectphone =()=>{
    phone = phoneinput.value
    var reg = /^(91|\+91|0)?[ ]?[9876][0-9]{9}$/g
    if(!reg.test(phone)&&phone!=""){
        inputdiv[3].after(errorphonediv)
    }
    else{
        errorphonediv.remove();
    }
}

phoneinput.addEventListener("keyup",checkcorrectphone)

//------------------for password -----------------------------------

let passwordinput = document.getElementById("password")
let errorpassworddiv = document.createElement("div")
errorpassworddiv.classList.add("alert","alert-danger")
errorpassworddiv.innerHTML="Password must be atleast 8 digits long"
const checkcorrectpassword = ()=>{
    password = passwordinput.value
    reg = /^.{8,}$/
    if(!reg.test(password)&&password!=""){
        inputdiv[2].after(errorpassworddiv)
    }
    else{
        errorpassworddiv.remove();
    }
}
passwordinput.addEventListener("keyup",checkcorrectpassword)