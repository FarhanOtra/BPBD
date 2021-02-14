@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="header bg-gradient-primary pb-7 pt-5 pt-md-7">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-lg-6 col-7">
              <!-- <h6 class="h2 text-white d-inline-block mt-0 mb-0">Berita Keluar</h6> -->
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Rekap Berita Keluar</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{route('beritakeluar.create2')}}" class="btn btn-sm btn-neutral">Tambah Berita Keluar Bantuan</a>
              <a href="{{route('beritakeluar.create')}}" class="btn btn-sm btn-neutral">Tambah Berita Keluar Peminjaman</a>
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
              <h3 class="mb-0">Rekap Berita Keluar</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort">No.</th>
                    <th scope="col" class="sort">Tanggal</th>
                    <th scope="col" class="sort" >Nama Pihak Pertama</th>
                    <!-- <th scope="col" class="sort" >Instansi Donatur</th> -->
                    <!-- <th scope="col" class="sort" >Instansi Penerima</th> -->
                    <th scope="col" class="sort" >Instansi Pihak Pertama</th>
                    <th scope="col" class="sort" >Nama Pihak Kedua</th>
                    <th scope="col" class="sort" >Instansi Pihak Kedua</th>
                    


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
                      <span class="name mb-0 text-sm">{{$b->tanggal}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->pihak_kedua->nama}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->pihak_kedua->instansi}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->pihak_pertama->nama}}</span>
                    </td>
                    <td>
                      <span class="name mb-0 text-sm">{{$b->pihak_pertama->instansi}}</span>
                    </td>
                    @if(Auth()->user()->role == 1)
                    <td class="text-left">
                        <a class="btn btn-sm btn-neutral" href="{{route('beritakeluar.show',[$b->id])}}"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-neutral" href="{{route('beritakeluar.destroy',[$b->id])}}"><i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></a>
                    </td>
                    @endif
                  </tr>
                @endforeach
                </tbody>
              </table>
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