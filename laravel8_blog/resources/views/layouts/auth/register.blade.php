@extends('layouts.front.core.main')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-4 mb-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light">Register</h3>
                </div>

                <div class="card-body">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="name" value="{{ old('name') }}" />
                            <label for="name">Name</label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="email"
                                value="{{ old('email') }}" />
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="password" />
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button class="w-100 btn btn-lg btn-primary" type="submit">
                                Register
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center py-3">
                    <small>Allready Registered ? <a href="/login">Login Now!</a></small>
                </div>
            </div>
        </div>
    </div>
@endsection
