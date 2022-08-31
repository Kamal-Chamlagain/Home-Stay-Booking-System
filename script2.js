
const cname = document.getElementById('cname');
const cemail = document.getElementById('cemail');
const cphone = document.getElementById('cphone');
const form3 = document.getElementById('updatecustomer');
const errorElement3 = document.getElementById('error3');
var regex = /^[a-zA-Z ]{2,30}$/;
var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
var re = /^[9][7-8][0-9]{8}$/;
form3.addEventListener('submit', (e) => {
    let messages = [];
    const a = regex.test(cname.value);
    const em = pattern.test(cemail.value);
    const ph = re.test(cphone.value);
  
    if (!a) {
        messages.push("Invalid Name!");
    }
    else if (!em) {
        messages.push("Invalid Email!");
      
    }
    else if(!ph){
        messages.push("Invalid phone!");
       }
    
    if (messages.length > 0) {
        e.preventDefault();
        errorElement3.innerText = messages.join("\n");
    }
})