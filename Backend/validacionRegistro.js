let validar_registro = () =>{
    let nombre = document.getElementById("nombre").value
    let apellidos = document.getElementById("apellidos").value
    let password = document.getElementById("password").value
    let passoword_verif = document.getElementById("password_verif").value
    let email = document.getElementById("email").value
    let expresion = /\w+@\w+\.+[a-z]/;
    if(nombre === "" || apellidos === "" || email === "" || password === "" || passoword_verif === ""){
        alert("No puede dejar campos vacios")
        return false
    }
    else if(nombre.length>49 || apellidos.length>49 || email.length>49 || password.length>49 || passoword_verif.length>49){
        alert("No puede insertar mas de 50 letras")
        return false
    }
    else if(nombre.length<4){
        alert("El nombre no puede tener menos de 4 letras")
        return false
    }
    else if(apellidos.length<4){
        alert("Los apellidos no pueden tener menos de 4 letras")
        return false
    }
    else if(email.length<4){
        alert("El email no puede ser tan corto")
        return false
    }
    else if(password.length<4){
        alert("La contraseña no puede tener menos de 4 letras")
        return false
    }
    else if(!expresion.test(email)){
        alert("Correo no es valido")
        return false
    }
    else if(password !== passoword_verif){
        alert("Las contraseñas no coinciden")
        return false
    }
}
