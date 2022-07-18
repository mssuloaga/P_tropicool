@extends('layouts.main', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content bg-light">
    <div class="container-fluid ">
        <div class="row">
            
            <div class="col-lg-6 col-sm-12 p-4 mb-4">
            <h2>Cantidad de productos</h2>
                <div style="position: relative; height: 400px; width: 450px;">
                    <canvas id="myChart" height= "400" width= "400"></canvas>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 p-4">
            <h2>Cantidad de productos</h2>
                <div style="position: relative; height: 400px; width: 450px;">
                    <canvas id="myChartt" height= "400" width= "400"></canvas>
                </div>
            </div>
            
        </div>
        
    </div>
</div>
@endsection

<!-- librería chart js -->
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                        backgroundColor: ['#005B9A','#0191C8','#74C2E1','#8C8984'],
                        borderColor: ['black'],
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

    <script>
        $(document).ready(function(){
            var cData = JSON.parse(`<?php echo $data; ?>`)
            //console.log(cData)
            const ctx = document.getElementById('myChartt').getContext('2d');

            const myChartt = new Chart(ctx,{
                type:'bar', //pie 
                data:{
                    labels:cData.label,
                    datasets: [{
                        label:'',
                        data:cData.data,
                        backgroundColor: ['#9561e2','#6574cd'],
                        borderColor: ['black'],
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