let validarCampos = (event,email,senha)=>{
    if(email == "" || senha == ""){
        event.preventDefault();
        if(email == "" && senha!=""){
            document.getElementById("email-required").style.display = "block";
            document.getElementById("senha-required").style.display = "none";
        }else if(senha == "" && email!=""){
            document.getElementById("senha-required").style.display = "block";
            document.getElementById("email-required").style.display = "none";
        }else{
            document.getElementById("email-required").style.display = "block";
            document.getElementById("senha-required").style.display = "block";
        }
    }else{
        document.getElementById("email-required").style.display = "none";
        document.getElementById("senha-required").style.display = "none";
    }
}
document.getElementById("btnLogar").addEventListener("click", function(event) {
    let email = document.getElementById("email").value;
    let senha = document.getElementById("senha").value;
    validarCampos(event,email,senha);
});