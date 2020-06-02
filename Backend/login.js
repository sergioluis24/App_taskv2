console.log("funcionando")
let validar_login = () => {
    let email_login = document.getElementById("email").value
    let password_login = document.getElementById("password").value
    let expresion = /\w+@\w+\.+[a-z]/;
    
    if (email_login === "" || password_login === "") {
        alert("No puede dejar campos vacios")
    } else if (email_login.length < 4 || password_login.length < 4) {
        alert("Los campos no pueden contener menos de 4 caracteres")
        return false
    } else if (!expresion.test(email_login)) {
        alert("Correo no es valido")
        return false
    }
    
}