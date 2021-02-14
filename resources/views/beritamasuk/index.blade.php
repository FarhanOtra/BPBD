@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <!-- Header -->
    <div class="header bg-gradient-primary pb-7 pt-5 pt-md-7">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mt-0 mb-0">Berita Masuk</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Berita Acara Masuk</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{route('beritamasuk.create')}}" class="btn btn-sm btn-neutral">+ Tambah Berita Masuk</a>
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

              <h3 class="mb-0">Rekap Berita Masuk</h3>

            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="table" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>

                    <th scope="col" class="sort">No.</th>
                    <th scope="col" class="sort">Tanggal</th>
                    <th scope="col" class="sort" >Nama Donatur</th>
                    <th scope="col" class="sort" >Instansi Donatur</th>
                    <th scope="col" class="sort" >Nama Penerima</th>
                    <th scope="col" class="sort" >Instansi Penerima</th>

                    @if(Auth()->user()->role == 1)
                    <th scope="col">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody class="list">
                @foreach($beritamasuk as $b)
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
                      <span class="name mb-0 text-sm">{{$b->donatur->instansi}} - {{$b->donatur->nama}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->penerima->instansi}} - {{$b->penerima->nama}}</span>
                    </td>
                    <td>

                      <span class="name mb-0 text-sm">{{$b->donatur->instansi}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->penerima->nama}}</span>

                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->penerima->instansi}}</span>
                    </td>
                    @if(Auth()->user()->role == 1)
                    <td class="text-left">
                        <a class="btn btn-sm btn-neutral" href="{{route('beritamasuk.show',[$b->id])}}" title="show detail"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-neutral" href="{{route('beritamasuk.print',[$b->id])}}" title="Print Berita Acara"><i class="fas fa-print"></i></a>
                        <a class="btn btn-sm btn-neutral" href="{{route('beritamasuk.destroy',[$b->id])}}" title="Hapus"><i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></a>
                    </td>
                    @endif
                  </tr>
                @endforeach
                </tbody>
              </table>

              <script type="text/javascript"> 
              $.noConflict();
                jQuery(document).ready(function ( $ ) {
                    $('#table').DataTable({
                        dom: 'Bfrtip',
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                    });
                });
              </script>


 
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
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