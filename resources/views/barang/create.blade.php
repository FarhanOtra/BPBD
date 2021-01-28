@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="header bg-gradient-primary pb-7 pt-5 pt-md-7">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mt-0 mb-0">Barang</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('barang.index')}}">List Barang</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Barang</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              
            </div>
          </div>
        </div>
      </div>
   </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
        <div class="col">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Tambah Barang') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('barang.store') }}" autocomplete="off">
                            @csrf
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                @include('barang._form')
                                <div class="text-left">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Tambah') }}</button>
                                </div>
                            </div>
                        </form>
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