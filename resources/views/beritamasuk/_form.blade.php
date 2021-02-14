<div>
<div class="card bg-secondary shadow mb-4">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Tanggal') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="form-group{{ $errors->has('tanggal') ? ' has-danger' : '' }}">
        <input type="date" name="tanggal" id="input-tanggal" class="form-control form-control-alternative{{ $errors->has('tanggal') ? ' is-invalid' : '' }}" placeholder="{{ __('Tanggal') }}" required autofocus>

        @if ($errors->has('tanggal'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('tanggal') }}</strong>
            </span>
        @endif
    </div>
                    </div>
</div>                    
</div>
<div>
    <div class="row">
        <div class="col-6">
        <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Penerima') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="form-group{{ $errors->has('p_nama') ? ' has-danger' : '' }}">
            <input type="text" name="p_nama" id="input-p_nama" class="form-control form-control-sm form-control-alternative{{ $errors->has('p_nama') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" required autofocus>

            @if ($errors->has('p_nama'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('p_nama') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('p_jabatan') ? ' has-danger' : '' }}">
            <input type="text" name="p_jabatan" id="input-p_jabatan" class="form-control form-control-sm form-control-alternative{{ $errors->has('p_jabatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Jabatan') }}" required autofocus>

            @if ($errors->has('p_jabatan'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('p_jabatan') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('p_instansi') ? ' has-danger' : '' }}">
            <input type="text" name="p_instansi" id="input-p_instansi" class="form-control form-control-sm form-control-alternative{{ $errors->has('p_instansi') ? ' is-invalid' : '' }}" placeholder="{{ __('Instansi') }}" required autofocus>

            @if ($errors->has('p_instansi'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('p_instansi') }}</strong>
                </span>
            @endif
        </div> 
                    </div>
                </div>
        </div>
        <div class="col-6 md-mr-50">
        <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Donatur') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="form-group{{ $errors->has('d_nama') ? ' has-danger' : '' }}">
            <input type="text" name="d_nama" id="input-d_nama" class="form-control form-control-sm form-control-alternative{{ $errors->has('d_nama') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" required autofocus>

            @if ($errors->has('d_nama'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('d_nama') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('d_jabatan') ? ' has-danger' : '' }}">
            <input type="text" name="d_jabatan" id="input-d_jabatan" class="form-control form-control-sm form-control-alternative{{ $errors->has('d_jabatan') ? ' is-invalid' : '' }}" placeholder="{{ __('Jabatan') }}" required autofocus>

            @if ($errors->has('d_jabatan'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('d_jabatan') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('d_instansi') ? ' has-danger' : '' }}">
            <input type="text" name="d_instansi" id="input-d_instansi" class="form-control form-control-sm form-control-alternative{{ $errors->has('d_instansi') ? ' is-invalid' : '' }}" placeholder="{{ __('Instansi') }}" required autofocus>

            @if ($errors->has('d_instansi'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('d_instansi') }}</strong>
                </span>
            @endif
        </div>
                    </div>
                </div>
        </div>        
    </div>
</div>

<br>

<div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('List Barang') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Nama Barang</th>
                    <th scope="col" class="sort" data-sort="budget">Expired</th>
                    <th scope="col" class="sort" data-sort="status">Jumlah</th>
                    <th scope="col" class="sort" data-sort="completion"></th>
                  </tr>
                </thead>
                <tbody class="list">
                    <div class="form-group" id="tampilSelect">
                                <table class="container-fluid" id="tambahSelect">
                                    <tr>
                                        <input name="id[]" type="hidden" value="1">
                                        <td>
                                            <select class="form-control" name="barang_id[]">
                                            @foreach ($barang as $b)
                                                <option value="{{ $b->id }}">{{ $b->nama_barang}}</option>
                                            @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="date" name="exp[]" id="input-exp" class="form-control form-control-alternative{{ $errors->has('exp[0]') ? ' is-invalid' : '' }}" placeholder="{{ __('Expired') }}" required autofocus>
                                        </td>
                                        <td>
                                            <input type="text" name="jumlah[]" id="input-jumlah" class="form-control form-control-alternative{{ $errors->has('jumlah[0]') ? ' is-invalid' : '' }}" placeholder="{{ __('Jumlah') }}" required autofocus>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success" id="tombolTambahSelect">+</button>
                                        </td>
                                    </tr>
                                </table>
                    </div>
                </tbody>
              </table>
            </div>

                    </div>
                </div>
