@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
        
    <div class="container-fluid mt--7">
            <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
            
                <!-- <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Ringkasan</h6>
                                <h2 class="text-black mb-0">Transaksi Terakhir</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[20, 10, 30, 15, 40, 20, 60, 60]}]}}'>
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Masuk</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 30, 5, 25, 10, 30, 15, 60, 40]}]}}'>
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Keluar</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body"> 
                         Chart 
                        <div class="chart">
                           Chart wrapper 
                           <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
                <br> -->

                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Transaksi Masuk Terakhir</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">No.</th>
                                    <th scope="col" class="sort" data-sort="name">Tanggal</th>
                                    <th scope="col" class="sort" data-sort="name">Barang</th>
                                    <th scope="col" class="sort" data-sort="name">Donatur</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($beritamasuk as $b)
                            <tr>
                                <td>
                                <span class="name mb-0 text-sm">{{$loop->iteration}}</span>
                                </td>
                                <td>
                                <span class="name mb-0 text-sm">{{$b->tanggal}}</span>
                                </td>
                                <td>
                                @foreach($b->detail_masuk as $d)
                                <span class="name mb-0 text-sm">{{$d->barang->nama_barang}} </span>
                                @endforeach
                                </td>
                                <td>
                                <span class="name mb-0 text-sm">{{$b->donatur->instansi}}</span>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Transaksi Keluar Terakhir</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">No.</th>
                                    <th scope="col" class="sort" data-sort="name">Tanggal</th>
                                    <th scope="col" class="sort" data-sort="name">Barang</th>
                                    <th scope="col" class="sort" data-sort="name">Tujuan</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($beritakeluar as $k)
                            <tr>
                                <td>
                                <span class="name mb-0 text-sm">{{$loop->iteration}}</span>
                                </td>
                                <td>
                                <span class="name mb-0 text-sm">{{$k->tanggal}}</span>
                                </td>
                                <td>
                                @foreach($k->detail_keluar as $m)
                                <span class="name mb-0 text-sm">{{$m->barang->nama_barang}} </span>
                                @endforeach
                                </td>
                                <td>
                                <span class="name mb-0 text-sm">{{$k->pihak_kedua->instansi}}</span>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                        <div class="col">
                        <table class="table align-items-center table-flush">
                            <div class="alert alert-danger" role="alert">
                                <strong>Produk</strong> sudah kedaluwarsa!
                            </div>
                            <div class="alert alert-warning" role="alert">
                                <strong>Produk</strong> akan kedaluwarsa!
                            </div>
                        </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush