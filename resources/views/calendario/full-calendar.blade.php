@extends('layouts.main', ['activePage' => 'calendario', 'titlePage' => 'Calendario'])

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/locale/es.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Calendario de eventos</h4>
                            <p class="card-category">Registro de actividades</p>
                        </div>
                
                        <div class="card p-4">
                    
                            <div id="calendar"></div>   
                        </div>
                                                        
                    </div>
                </div>            
            </div>
        </div>
    </div>

    <style>
    .fc-event {
        font-size: 17px !important;
    }

    .fc-day-grid-event .fc-content {
        white-space: normal !important;
        overflow: hidden !important;
    }
    </style>
@endsection

 
@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/locale/es.js'></script>
    
    <script>
        
        $(document).ready(function () {

            $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        

            var calendar = $('#calendar').fullCalendar({
                editable:true,
                /* monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'], */
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events:'/calendario.full-calendar',
                selectable:true,
                selectHelper: true,
                eventColor: '#ffffa2',
                select:function(start, end, allDay)
                {
                    var title = prompt('Nombre del Evento:');

                    if(title)
                    {
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                        $.ajax({
                            url:"/calendario.full-calendar/action",
                            type:"POST",
                            data:{
                                title: title,
                                start: start,
                                end: end,
                                type: 'add'
                            },
                            success:function(data)
                            {
                                calendar.fullCalendar('refetchEvents');
                                /* alert("Evento Creado Exitosamente"); */
                            }
                        })
                    }
                },
                editable:true,
                eventResize: function(event, delta)
                {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"/calendario.full-calendar/action",
                        type:"POST",
                        data:{
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success:function(response)
                        {
                            calendar.fullCalendar('refetchEvents');
                            /* alert("Evento Actualizado"); */
                        }
                    })
                },
                eventDrop: function(event, delta)
                {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"/calendario.full-calendar/action",
                        type:"POST",
                        data:{
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success:function(response)
                        {
                            calendar.fullCalendar('refetchEvents');
                            /* alert("Evento Actualizado"); */
                        }
                    })
                },

                eventClick:function(event)
                {
                    if(confirm("¿Está Seguro de Eliminar?"))
                    {
                        var id = event.id;
                        $.ajax({
                            url:"/calendario.full-calendar/action",
                            type:"POST",
                            data:{
                                id:id,
                                type:"delete"
                            },
                            success:function(response)
                            {
                                calendar.fullCalendar('refetchEvents');
                                /* alert("Evento eliminado"); */
                            }
                        })
                    }
                }
            });

        });
  
    </script>
    
@endsection
