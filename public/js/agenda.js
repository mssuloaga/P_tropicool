

document.addEventListener('DOMContentLoaded', function() {
  let formulario = document.querySelector("form");
  var calendarEl = document.getElementById('agenda');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale:"es",
    
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
      },

      dateClick:function(info){
        $("#calendario").modal("show");
      }
  });


  calendar.render();
  document.getElementById("btnGuardar").addEventListener("click",function(){
    const datos = new FormData(formulario);
    console.log(datos);
    console.log(formulario.title.value);

 

    axios.post("http://127.0.0.1:8000/calendario/agregar", datos).
    then(
      (respuesta) =>{
        $("#calemdario").modal("hide");
      }
      ).catch(
        error=>{
          if(error.response){
            console.log(error.response.data); 
          }
        }
      )
  });
});