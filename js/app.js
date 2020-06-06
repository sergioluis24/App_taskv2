let ano,mes,dia,hora,minutos,segundos
let fecha = new Date()

let current_date = document.getElementById("current_date").innerHTML =`
${fecha.getMonth()}/${fecha.getDay()}/${fecha.getFullYear()}
`