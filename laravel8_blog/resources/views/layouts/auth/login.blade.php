@extends('layouts.front.core.main')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-5">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session()->get('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif

            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light">Login</h3>
                </div>

                <div class="card-body">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email"
                                placeholder="email" name="email" value="{{ old('email') }}" />
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control @error('password') is-invalid @enderror" id="password"
                                type="password" placeholder="Password" name="password" />
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button class="w-100 btn btn-lg btn-primary" type="submit"> Login</button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center py-3">
                    <small>Not Registered ? <a href="/register">Register Now!</a></small>
                </div>
            </div>
        </div>
    </div>
@endsection
