
const rpass = document.getElementById('cnpass');
const rcpass = document.getElementById('ccpass');

const form1 = document.getElementById('changepassword');
const errorElement3 = document.getElementById('error2');

form1.addEventListener('submit', (e) => {
    let messages = [];
    
  
    
 if (rpass.value.length <= 6) {
        messages.push("password must be longer than 6 character!");
    }
    else if (rpass.value!= rcpass.value) {
        messages.push("Confirm password doesnot match !");
    }

    if (messages.length > 0) {
        e.preventDefault()
        errorElement3.innerText = messages.join("\n")
    }
})


