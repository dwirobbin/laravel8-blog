@extends('layouts.front.core.main')

@section('content')

    <h1 class="fw-bolder text-center">All Categories</h1>

    <div class="container">
        <div class="row">

            @forelse ($categories as $category)
                <div class="col-md-4 my-5">
                    <a href="{{ url('home?category=' . $category->slug) }}" class="text-decoration-none">
                        <div class="card bg-dark text-white">
                            <img src="https://source.unsplash.com/700x600?{{ $category->name }}" class="card-img"
                                alt="{{ $category->name }}">
                            <div class="card-img-overlay d-flex align-items-center p-0">
                                <h5 class="card-title flex-fill p-4 text-center fs-3"
                                    style="background-color: rgba(0, 0, 0, .7)">{{ $category->name }}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="alert alert-warning" role="alert">
                    Belum Ada Kategori
                </div>
            @endforelse

        </div>
    </div>

@endsection
