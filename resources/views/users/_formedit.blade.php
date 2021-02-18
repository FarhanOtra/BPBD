    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-nama">{{ __('Nama') }}</label>
        <input type="text" name="name" id="input-nama" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" value="{{$user->name}}" required>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('nohp') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-nohp">{{ __('No.Hp') }}</label>
        <input type="text" name="nohp" id="input-nohp" class="form-control form-control-alternative{{ $errors->has('nohp') ? ' is-invalid' : '' }}" placeholder="{{ __('No.Hp') }}" value="{{$user->nohp}}" required>

        @if ($errors->has('nohp'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nohp') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-nama">{{ __('Email') }}</label>
        <input type="text" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email"  value="{{$user->email}}" required>
        
        @if ($errors->has('email'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('intansi') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-instansi">{{ __('Instansi') }}</label>
        <input type="text" name="instansi" id="input-instansi" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Instansi') }}" type="text" name="instansi" value="{{$user->instansi}}" required>
        
        @if ($errors->has('instansi'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('instansi') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-role">{{ __('Role') }}</label>
        <select type="text" name="role" id="input-role" class="form-control form-control-alternative{{ $errors->has('role') ? ' is-invalid' : '' }}" placeholder="{{ __('Role') }}" type="role" name="role" value="{{$user->role}}" required>
            @php
            $role=$user->role
            @endphp 

        <option value="{{$user->role}}">
            @if( $role == 1)
            Admin
            @elseif($role == 2)
            User
            @else
            Unknown
            @endif
        </option>
        <option value="1">Admin</option>
        <option value="2">User</option>
        </select>
        @if ($errors->has('role'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('role') }}</strong>
            </span>
        @endif
    </div>

    

