@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <h5 class="card-title text-center">SIGN UP</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="form-group text-center">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control-sm mx-auto" id="name" name="name" value="{{ old('name') }}" required style="width: 50%;">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group text-center">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control form-control-sm mx-auto" id="email" name="email" value="{{ old('email') }}" required style="width: 50%;">
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
                            <div class="form-group text-center">
                                <label for="password-confirm">Confirm Password</label>
                                <input type="password" class="form-control form-control-sm mx-auto" id="password-confirm" name="password_confirmation" required style="width: 50%;">
                            </div>
                                <button type="submit" class="btn btn-primary btn-block mx-auto" style="width: 30%;">Register</button>
                        </div>
                        <p class="text-center mt-3">
                            <a href="{{ route('login') }}">Already have an account?</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
