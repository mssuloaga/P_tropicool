

var evento = new bootstrap.Modal(document.getElementById('evento'));

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale:"es",
      
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,listWeek'
        },

        events: "http://127.0.0.1:8000/calendario/mostrar",

        dateClick: function(info) {
            $("#evento").modal("show");
        }

    });

    calendar.render();

   

   

    let formulario = document.querySelector("form");
    document.getElementById("btnGuardar").addEventListener("click",function(){   
      var form = document.getElementById("evento"),
      myData = new FormData(form);
     
        const datos= new FormData(formulario);
          
        console.log(myData);
        console.log(form.title.value);


        
        axios.post("http://127.0.0.1:8000/calendario/agregar", datos).
          then(
            (respuesta) => {
              $("#evento").modal("hide");
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