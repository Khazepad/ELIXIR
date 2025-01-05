@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card-body">
                <h5 class="card-title text-center">LOG IN</h5>
                @if ($errors->any())
                    <div class="alert alert-danger small mx-auto" style="width: 45%;">
                        {{ $errors->first() }}
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group text-center">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control form-control-sm mx-auto" id="email" name="email" required style="width: 50%;">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-sm mx-auto" id="password" name="password" required style="width: 50%;">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mx-auto" style="width: 30%;">Log In</button>
                </form>
                <div class="row mb-3 text-center">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label small" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                <p class="text-center mt-3">
                    <a href="{{ route('register') }}">Need to sign up?</a> | <a href="#">Forgot your password?</a>
                </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
