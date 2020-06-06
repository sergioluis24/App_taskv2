document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid' ]
    });
    calendar.setOption('locale', 'Es');
    calendar.render();
  });


  // let toggle_calendar = false
  let btn_calendar = document.getElementById("btn_calendar");
  
  btn_calendar.addEventListener("click",() =>{
    let calendar = document.getElementById("calendar")
    calendar.classList.toggle("d-none")
    // if(!toggle_calendar){
    //   calendar.render();
    //   toggle_calendar = true
    // }else toggle_calendar = true
  })