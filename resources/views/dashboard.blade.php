@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
                

                <div class="card" style="width: 770px;">
                
                <img class="card-img-top" src="{{ asset('argon') }}/img/brand/pusdalopse.jpeg" alt="Card image cap" style="height:450px;opacity:0.7">
                <div class="card-body">
                    <!-- <h5 class="card-title">Card title</h5> -->
                    <p class="card-text">Selamat Datang di Aplikasi Sistem Informasi Logistik BPBD Provinsi Sumatera Barat</p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
                </div>


            </div>
            <div class="col-xl-4">
            <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                            @foreach($exp as $e)
                            <div class="alert alert-danger" role="alert">
                            <?php
                                setlocale(LC_ALL, 'id-ID', 'id_ID');

                                $tanggal = strtotime($e->exp);
                                $hari = strftime("%A", strtotime($tanggal));
                            ?>
                            <b>{{$e->barang->nama_barang}}</b> akan segera expired pada <b>{{$hari}}, {{date('d F Y',strtotime($e->exp))}}</b>
                            </div>
                            @endforeach
                            
                                <!-- <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total orders</h2> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card-body"> -->
                        <!-- Chart -->
                        <!-- <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div> -->
                    <!-- </div> -->
                </div>
                <!-- <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total orders</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body"> -->
                        <!-- Chart -->
                        <!-- <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                
            </div>
            
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush