@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> 

    <!-- Header -->
    <div class="header bg-gradient-primary pb-7 pt-5 pt-md-7">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mt-0 mb-0">Rekap Keluar</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Rekap Barang Keluar</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <!-- <a href="{{route('barang.create')}}" class="btn btn-sm btn-neutral">+ Tambah Berita Masuk</a> -->
            </div>
          </div>
        </div>
      </div>
   </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Rekap Barang Keluar</h3>
            </div>
            <!-- Light table -->
            <div style="padding:20px">
            <div class="table-responsive">
              <table id="table" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">No.</th>
                    <th scope="col" class="sort" data-sort="name">Tanggal</th>
                    <th scope="col" class="sort" data-sort="budget">Tujuan Bantuan</th>
                    <th scope="col" class="sort" data-sort="status">Jenis Bantuan</th>
                    <th scope="col" class="sort" data-sort="status">Jumlah Bantuan</th>
                    <th scope="col" class="sort" data-sort="status">Satuan</th>
                    @if(Auth()->user()->role == 1)
                    <!-- <th scope="col">Action</th> -->
                    @endif
                  </tr>
                </thead>
                <tbody class="list">
                @foreach($rekapkeluar as $b)
                  <tr>
                    <td>
                      <span class="name mb-0 text-sm">{{$loop->iteration}}</span>
                    </td>
                    <td>
                    <?php 
                        setlocale(LC_ALL, 'id-ID', 'id_ID');
                        $tanggal = strtotime($b->berita_keluar->tanggal);
                        $hari = strftime("%A", strtotime($b->berita_keluar->tanggal));
                        // $hari = strftime("%D", $tanggal);
                        // $hari = date('a',$tanggal);
                        $tgl = date('d',$tanggal);
                        // $bulan = date('m',$tanggal);
                        $bulan = strftime("%B", strtotime($b->berita_keluar->tanggal));
                        // $tahun = date('y',$tanggal);
                        $tahun = strftime("%Y", strtotime($b->berita_keluar->tanggal));
                            // $tanggal = strtotime($b->berita_masuk->tanggal)
                    // ?>
                      <span class="name mb-0 text-sm">{{$hari}}, {{$tgl}} {{$bulan}} {{$tahun}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->berita_keluar->pihak_kedua->instansi}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->barang->nama_barang}}</span>
                    </td>
                    <td>
                        <span class="name mb-0 text-sm">{{$b->jumlah}}</span>
                    </td>
                    <td>
                        <span class="name mb-0 text-sm">{{$b->barang->satuan}}</span>
                    </td>
                    @if(Auth()->user()->role == 1)

                    @endif
                  </tr>
                @endforeach
                </tbody>
              </table>
              </div>

              <script type="text/javascript"> 
              $.noConflict();
                jQuery(document).ready(function ( $ ) {
                    $('#table').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                          extend: 'pdf',
                          title: 'Rekap Barang Keluar',
                        }, {
                          extend: 'print',
                          title: 'Rekap Barang Keluar',
                        }, {
                          extend: 'excel',
                          title: 'Rekap Barang Keluar',
                        }]
                    });
                });
              </script>


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