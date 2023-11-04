const url = "../tp2/includes/api/auth-api/auth.php";

const email = document.getElementById("email");
const password = document.getElementById("password");
const btnLogin = document.getElementById("btnLogin");


btnLogin.addEventListener("click", ()=>{

    loguearse();

})

function loguearse() {

    loginForm = {};
    loginForm.email = email.value;
    loginForm.password = password.value;

    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(loginForm),
    };

    fetch(url, requestOptions)
        .then(response => response.text())
        .then(result => {
            if(result == "TRUE"){
                return navegarAlHome()
            }
            return alert("Verifique sus credenciales");
        })
        .catch(error => {
            console.error("Error:", error);
        });
        
}

function navegarAlHome(){
    window.location.href = "http://localhost/tp2/inicio/inicio.php";
}