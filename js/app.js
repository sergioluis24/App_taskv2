let ano,mes,dia,hora,minutos,segundos
let fecha = new Date()

let current_date = document.getElementById("current_date").innerHTML =`
${fecha.getMonth()}/${fecha.getDay()}/${fecha.getFullYear()}
`
// let agregar_form = document.getElementById("agregar_form");
// let agregar_btn = document.getElementById("agregar_btn")

// agregar_btn.addEventListener("click",()=>{
//     agregar_form.innerHTML = `
//     <form action="">
//     <input type="number" name="agregar_input" id="" class = "form-control " placeholder = '0'>
//     </form>
//     <button class="btn btn-primary mt-3 ml-2">Aceptar</button>
//     `
// })