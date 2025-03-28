function sendMail(){
    let parms = {
        name : document.getElementById("name").value,
        email : document.getElementById("email").value,
        message : document.getElementById("message").value,
    }
    emailjs.send("service_ea3ya1z","template_1ntgup3 ",parms).then(function(res){
        alert("Success" +res.status);
    }) 
}