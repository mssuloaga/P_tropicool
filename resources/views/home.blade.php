@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-sm-7"></div>
            <div class="col-2  ">
                <div class="pb-2">
                    <a href="#" class="btn btn-primary shadow" id="des_pdf">Generar reporte PDF</a>
                </div>
            </div>
        </div>
       
        <div class="row p-4"> 
            <div class="col-lg-1 "></div>
            <div class="col-lg-10">
                <div id="reportPage" class="row align-items-center d-flex overflow-hidden">  

                    <div class="col-lg-5 col-sm-12 p-4 shadow rounded border overflow-hidden" >
                        <h2 class="p-2 font-weight-bold  ">Cantidad de productos</h2>
                        <div class="charts" style="position: relative; height: 400px; width: 400px;">
                            <canvas id="myChart" height= "350" width= "350"></canvas>
                        </div>
                    </div>
                    <div class="col-2 p-2"></div>
                    <div class="col-lg-5 col-sm-12 p-4 shadow rounded border overflow-hidden">
                        <h2 class="p-2 font-weight-bold  ">Precio de productos</h2>
                        <div class="charts" style="position: relative; height: 400px; width: 400px;">
                            <canvas id="myChart2" height= "350" width= "350"></canvas>
                        </div>
                    </div>

                <div>
            </div>
            <div class="col-lg-1"></div>

        </div>
    </div>
</div>
@endsection

<!-- librería chart js -->
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://parall.ax/parallax/js/jspdf.js"></script> <!--Para generar el pdf-->
    <script>
        $(document).ready(function(){
            var cData = JSON.parse(`<?php echo $data; ?>`)
            //console.log(cData)
            const ctx = document.getElementById('myChart').getContext('2d');

            const myChart = new Chart(ctx,{
                type:'pie', //pie 
                data:{
                    labels:cData.label,
                    datasets: [{
                        label:'',
                        data:cData.data,
                        backgroundColor: [' #57e2ac ',' #f16b7b','#0ca0b5 ','#846694',' #d87e90','#f8cd5a'],
                        borderColor: ['yellow'],
                        borderWidth:1
                    }]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });       
    </script>
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://parall.ax/parallax/js/jspdf.js"></script> <!--Para generar el pdf-->

<script>
     $(document).ready(function(){
            var cData2 = JSON.parse(`<?php echo $data2; ?>`)
            //console.log(cData)
            const ctx2 = document.getElementById('myChart2').getContext('2d');

            const myChart = new Chart(ctx2,{
                type:'bar', //pie, line
                data:{
                    labels:cData2.label2,
                    datasets: [{
                        label:'',
                        data:cData2.data2,
                        backgroundColor: [' #6bc2e3 ',' #0ca0b5 '],
                        borderColor: ['yellow'],
                        borderWidth:1
                    }]
                },
                options:{
                    scales:{
                        yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });
</script>
@endpush

@push('js')
<script>
    
    $('#des_pdf').click(function(event) {
  // obtiene le número de reportpages
  var reportPageHeight = $('#reportPage').innerHeight();
  var reportPageWidth = $('#reportPage').innerWidth();
  
  // ccrea un nuenvo proyecto canvas
  var pdfCanvas = $('<canvas />').attr({
    id: "canvaspdf",
    width: reportPageWidth,
    height: reportPageHeight
  });
  
  // posición 
  var pdfctx = $(pdfCanvas)[0].getContext('2d');
  var pdfctxX = 0;
  var pdfctxY = 0;
  var buffer = 100;
  
  // para cada chart.js chart
  $("canvas").each(function(index) {
    // get the chart height/width
    var canvasHeight = $(this).innerHeight();
    var canvasWidth = $(this).innerWidth();
    
    // dibujo dentro del nuevo canva
    pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
    pdfctxX += canvasWidth + buffer;
    
    // página de reporte en el nuevo canvas
    if (index % 2 === 1) {
      pdfctxX = 0;
      pdfctxY += canvasHeight + buffer;
    }
  });
  
  // crear nuevo pdf y agregar nuevo canvas en la imagen
  var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
  pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);
  
  // descargar pdf
  pdf.save('Reporte.pdf');
});

</script>
@endpush