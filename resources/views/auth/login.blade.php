@extends('layouts.acme.admin.login')

@section('content')
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body text-right">
        <p class="login-box-msg text-bold">{{ trans('auth.login') }}</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group mb-3">
                <input type="text" placeholder="{{ trans('auth.email') }}" id="email" class="form-control text-right" name="email" required
                    autofocus>
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group mb-3">
                <input type="password" placeholder="{{ trans('auth.password') }}" id="password" class="form-control text-right" name="password" required>
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            {{-- <div class="form-group mb-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div> --}}
            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">{{ trans('auth.signin') }}</button>
            </div>
        </form>

        {{-- <p class="my-2">
          <a href="{{ route('password.request') }}">{{ __('passwords.forget') }}</a>
        </p> --}}

      </div>
    </div>

@endsection

