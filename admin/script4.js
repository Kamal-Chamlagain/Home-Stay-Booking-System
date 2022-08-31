
const apass = document.getElementById('anpass');
const rapass = document.getElementById('acpass');

const aform1 = document.getElementById('achangepassword');
const aerrorElement3 = document.getElementById('aerror2');

aform1.addEventListener('submit', (e) => {
    let messages = [];
    
  
    
 if (apass.value.length <= 6) {
        messages.push("password must be longer than 6 character!");
    }
    else if (apass.value!= rapass.value) {
        messages.push("Confirm password doesnot match !");
    }

    if (messages.length > 0) {
        e.preventDefault()
        aerrorElement3.innerText = messages.join("\n")
    }
})


