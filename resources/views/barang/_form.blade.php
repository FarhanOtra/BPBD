    <div class="form-group{{ $errors->has('id_barang') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-name">{{ __('ID Barang') }}</label>
        <input type="text" name="id_barang" id="input-id_barang" class="form-control form-control-alternative{{ $errors->has('id_barang') ? ' is-invalid' : '' }}" placeholder="{{ __('ID Barang') }}" required autofocus>

        @if ($errors->has('id_barang'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('id_barang') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('nama_barang') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-nama_barang">{{ __('Nama Barang') }}</label>
        <input type="text" name="nama_barang" id="input-nama_barang" class="form-control form-control-alternative{{ $errors->has('nama_barang') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Barang') }}"  required>

        @if ($errors->has('nama_barang'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nama_barang') }}</strong>
            </span>
         @endif
    </div>

    <div class="form-group{{ $errors->has('jenis_barang') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-jenis_barang">{{ __('Jenis Barang') }}</label>
        <select class="form-control" name="jenis_barang" id="exampleFormControlSelect2" class="form-control form-control-alternative{{ $errors->has('jenis_barang') ? ' is-invalid' : '' }}"  required>
            @foreach($jenis_barang as $jb)
            <option value="{{$jb->id}}">{{$jb->jenis_barang}}</option>
            @endforeach
        </select>
        @if ($errors->has('jenis_barang'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('jenis_barang') }}</strong>
            </span>
         @endif
    </div>

    <div class="form-group{{ $errors->has('harga_barang') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-harga_barang">{{ __('Harga Barang') }}</label>
        <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Rp</span>
        </div>
        <input type="text" name="harga_barang" id="input-harga_barang" class="form-control {{ $errors->has('harga_barang') ? ' is-invalid' : '' }}" placeholder="{{ __('Harga Barang') }}"  required>
        </div>
        @if ($errors->has('harga_barang'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('harga_barang') }}</strong>
            </span>
         @endif
    </div>

    <div class="form-group{{ $errors->has('satuan') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-satuan">{{ __('Satuan') }}</label>
        <input type="text" name="satuan" id="input-satuan" class="form-control form-control-alternative{{ $errors->has('satuan') ? ' is-invalid' : '' }}" placeholder="{{ __('Satuan') }}"  required>

        @if ($errors->has('satuan'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('satuan') }}</strong>
            </span>
         @endif
    </div>