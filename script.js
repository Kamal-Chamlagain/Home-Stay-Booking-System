const rname = document.getElementById('rname');
const rpass = document.getElementById('rpass');
const rcpass = document.getElementById('rcpass');
const remail = document.getElementById('remail');

const rphone = document.getElementById('rphone');
const form = document.getElementById('RegForm');
const errorElement = document.getElementById('error');
var regex = /^[a-zA-Z ]{2,30}$/;
var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
var re = /^[9][7-8][0-9]{8}$/;
var add=/^[a-zA-Z0-9\s,'-]*$/;
form.addEventListener('submit', (e) => {
    let messages = [];
    const a = regex.test(rname.value);
    const em = pattern.test(remail.value);
    const ph = re.test(rphone.value);

    if (!a) {
        messages.push("Invalid Name!");
    }
    else if (!em) {
        messages.push("Invalid Email!");
      
    }
 
    else if(!ph){
        messages.push("Invalid phone!");
       }
    else if (rpass.value.length <= 6) {
        messages.push("password must be longer than 6 character!");
    }
    else if (rpass.value!= rcpass.value) {
        messages.push("Both password doesnot match !");
    }

    if (messages.length > 0) {
        e.preventDefault()
        errorElement.innerText = messages.join("\n")
    }
})


