@extends('layouts.app')

@section('content')
    <!-- Header -->
    <div class="header bg-gradient-primary pb-7 pt-5 pt-md-7">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center">
            <div class="col-lg-8 col-7">
              <h6 class="h2 text-white d-inline-block mt-0 mb-0">Berita Masuk</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{route('beritamasuk.index')}}">Berita Masuk</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Tambah Berita Masuk</li>
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
                            <h3 class="col-12 mb-0">{{ __('Tambah Berita Masuk') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('beritamasuk.store') }}" autocomplete="off">
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
                                @include('beritamasuk._form')
                                <div class="text-left ml-4">
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
  <script>
   var i = 0;
            
            $('#tombolTambahSelect').on('click',function(){
                i++;
                $('#tambahSelect').append(`<tr>
                        <input name="id[]" type="hidden" value="`+i+`">
                        <td>
                            <select class="form-control" name="barang_id[]" required>
                            @foreach ($barang as $b)
                                <option value="{{ $b->id }}">{{ $b->nama_barang}}</option>
                            @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="date" name="exp[]" id="input-exp" class="form-control form-control-alternative{{ $errors->has('id_barang') ? ' is-invalid' : '' }}" placeholder="{{ __('Expired') }}" required autofocus>
                        </td>
                        <td>
                            <input type="number" name="jumlah[]" id="input-jumlah" class="form-control form-control-alternative{{ $errors->has('jumlah[0]') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah') }}" required autofocus>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-tr">-</button>
                        </td>
                    </tr>`)
            })

            $(document).on('click', '.remove-tr', function(){  
                $(this).parents('tr').remove();
            });

  </script>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush