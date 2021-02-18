@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.semanticui.min.css">

    <!-- Header -->
    <div class="header bg-gradient-primary pb-7 pt-5 pt-md-7">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mt-0 mb-0">Berita Keluar</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Rekap Berita Keluar</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{route('beritakeluar.create')}}" class="btn btn-sm btn-neutral">+ Tambah Berita Keluar</a>
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
              <h3 class="mb-0">List Berita Keluar</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive" style="padding: 40px; padding-top: 0px;">
              <table id="table" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort">No.</th>
                    <th scope="col" class="sort">Tanggal</th>
                    <th scope="col" class="sort">Jenis</th>
                    <th scope="col" class="sort">Kegiatan</th>
                    <th scope="col" class="sort" >Pihak Pertama</th>
                    <th scope="col" class="sort" >Pihak Kedua</th>

                    @if(Auth()->user()->role == 1)
                    <th scope="col">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody class="list">
                @foreach($beritakeluar as $b)
                  <tr>
                    <td>
                      <span class="name mb-0 text-sm">{{$loop->iteration}}</span>
                    </td>
                    <td>
                    <?php 

                        setlocale(LC_ALL, 'id-ID', 'id_ID');

                        $tanggal = strtotime($b->tanggal);
                        $hari = strftime("%A", strtotime($b->tanggal));
                        // $hari = strftime("%D", $tanggal);
                        // $hari = date('a',$tanggal);
                        $tgl = date('d',$tanggal);
                        // $bulan = date('m',$tanggal);
                        $bulan = strftime("%B", strtotime($b->tanggal));
                        // $tahun = date('y',$tanggal);
                        $tahun = strftime("%Y", strtotime($b->tanggal));
                    ?>
                      <span class="name mb-0 text-sm">{{$hari}}, {{$tgl}} {{$bulan}} {{$tahun}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->jenis}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->kegiatan}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->pihak_pertama->nama}} - {{$b->pihak_pertama->instansi}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->pihak_kedua->nama}} - {{$b->pihak_kedua->instansi}}</span>
                    </td>
                    @if(Auth()->user()->role == 1)
                    <td class="text-left">
                      @if($b->jenis == "Bantuan")
                        <a class="btn btn-sm btn-neutral" title="Print" href="{{route('beritakeluar.print',[$b->id])}}"><i class="fa fa-print" aria-hidden="true"></i></a>
                      @elseif($b->jenis == "Peminjaman")
                        <a class="btn btn-sm btn-neutral" title="Print" href="{{route('beritakeluar.print2',[$b->id])}}"><i class="fa fa-print" aria-hidden="true"></i></a>
                      @endif  
                        <a class="btn btn-sm btn-neutral" href="{{route('beritakeluar.destroy',[$b->id])}}" onclick="return confirm('Yakin Ingin Menghapus?')" ><i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></a>
                    </td>
                    @endif
                  </tr>
                @endforeach
                </tbody>
                <script type="text/javascript"> 
                  $.noConflict();
                    jQuery(document).ready(function ( $ ) {
                        $('#table').DataTable();
                    });
                  </script>
              </table>
            </div>
            <!-- Card footer -->
          </div>
        </div>
      </div>
    @include('layouts.footers.auth')
    @include('sweetalert::alert')
  </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush