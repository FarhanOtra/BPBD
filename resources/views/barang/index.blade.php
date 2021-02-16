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
    @include('sweetalert::alert')
    
    <div class="header bg-gradient-primary pb-7 pt-5 pt-md-7">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mt-0 mb-0">Barang</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">List Barang</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{route('barang.create')}}" class="btn btn-sm btn-neutral">+ Tambah Barang</a>
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
              <h3 class="mb-0">List Barang</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive" style="padding: 40px; padding-top: 0px;">
              <table id="table" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">No.</th>
                    <th scope="col" class="sort" data-sort="name">ID Barang</th>
                    <th scope="col" class="sort" data-sort="budget">Nama Barang</th>
                    <th scope="col" class="sort" data-sort="status">Jenis Barang</th>
                    <th scope="col" class="sort" data-sort="status">Harga</th>
                    <th scope="col" class="sort" data-sort="completion">Stock</th>
                    @if(Auth()->user()->role == 1)
                    <th scope="col">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody class="list">
                @foreach($barang as $b)
                  <tr>
                    <td>
                      <span class="name mb-0 text-sm">{{$loop->iteration}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->id_barang}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->nama_barang}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->jenis->jenis_barang}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">Rp. {{$b->harga}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->stock}}</span>
                    </td>
                    @if(Auth()->user()->role == 1)
                     <td class="text-left">
                        <a class="btn btn-sm btn-neutral" href="{{route('barang.edit',[$b->id])}}"><i class="fa fa-edit" style="color: green;" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-neutral brgdeletebtn" href="{{route('barang.destroy',[$b->id])}}"><i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></a>
                    </td>
                    @endif
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <script type="text/javascript"> 
              $.noConflict();
                jQuery(document).ready(function ( $ ) {
                    $('#table').DataTable();
                });
              </script>
            <!-- Card footer -->
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