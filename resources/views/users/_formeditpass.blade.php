<br>
<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-nama">{{ __('Change Password') }}</label>
        <input class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password">
        
        @if ($errors->has('password'))
            <span class="invalid-feedback" style="display: block;" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>