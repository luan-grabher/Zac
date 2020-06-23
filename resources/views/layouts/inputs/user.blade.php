<div class="form-group row">
    <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}:</label>

    <div class="col-md-6">
        <div class="input-group">
            <input id="user" type="text"
                   class="form-control @error('email') is-invalid @enderror" name="user"
                   value="{{ old('user') }}" required autofocus
                   onchange='$("#email").val($("#user").val() + "@"+ "{{env('MAIL_DOMAIN')}}")'
            >
            <div class="input-group-append">
                <label class="input-group-text">@
                    <fakeSpace>{{env('MAIL_DOMAIN')}}</label>
            </div>
        </div>

        @error('email')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>
