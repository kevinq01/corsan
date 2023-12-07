@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>

        <div class="section-body">
            {{-- Tarjetas --}}
            <div class="row">
                <!-- Carta para mostrar las ventas hechas en el año actual -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Productos</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $products->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carta para mostrar las ventas hechas en el año actual -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Productos en stock</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $productosEnStock }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Carta para mostrar las ventas hechas en el año actual -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Productos sin stock</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $productosSinStock }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Graficos --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" crossorigin="anonymous"></script>
    <script>
        // Configuración del gráfico
        const config = {
            type: 'bar',
            data: {
                labels: @json($labels), // Convierte la variable PHP $labels a JSON
                datasets: [{
                    label: 'Stock de Productos',
                    data: @json($data), // Convierte la variable PHP $data a JSON
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        // Crear el gráfico en el canvas con el id 'myChart'
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, config);
    </script>
@endsection
