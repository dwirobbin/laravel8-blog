@extends('layouts.front.core.main')

@section('content')
    <h1 class="fw-bolder mb-4 text-center">{{ $title }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/home" method="GET">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group">
                    <input class="form-control" type="text" name="search" placeholder="Search..."
                        value="{{ request('search') }}" />
                    <button class="btn btn-primary" type="submit">Go!</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card my-4">
            @if ($posts[0]->image)
                <figure style="max-height: 500px; overflow: hidden;">
                    <img class="img-fluid" src="{{ asset('storage/post-images/' . $posts[0]->image) }}" alt="" />
                </figure>
            @else
                <img class="img-fluid" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="" />
            @endif
            <div class="card-body text-center">
                <div class="text-muted fst-italic">
                    Posted at {{ $posts[0]->created_at->diffForHumans() }} By
                    <a href="{{ url('home?author=' . $posts[0]->author->username) }}"
                        class="text-decoration-none">{{ $posts[0]->author->name }}
                    </a>
                </div>
                <a class="badge bg-secondary text-decoration-none link-light my-2"
                    href="{{ url('home?category=' . $posts[0]->category->slug) }}">
                    {{ $posts[0]->category->name }}
                </a>
                <h2 class="card-title">{{ $posts[0]->title }}</h2>
                {{-- <p class="card-text">{!! Str::limit($posts[0]->body, 55) !!}</p> --}}
                <a class="btn btn-primary" href="{{ url('home/' . $posts[0]->slug) }}">Read more →</a>
            </div>
        </div>

        <div class="container p-0">
            <div class="row">

                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            @if ($post->image)
                                <img class="img-fluid" src="{{ asset('storage/post-images/' . $post->image) }}"
                                    alt="" />
                            @else
                                <img class="img-fluid" src="https://dummyimage.com/700x435/dee2e6/6c757d.jpg" alt="" />
                            @endif
                            <div class="card-body">
                                <div class="text-muted fst-italic">
                                    Posted on {{ date('d M Y', strtotime($post->created_at)) }} By
                                    <a href="{{ url('home?author=' . $post->author->username) }}"
                                        class="text-decoration-none">{{ $post->author->name }}
                                    </a>
                                </div>
                                <a class="badge bg-secondary text-decoration-none link-light my-2"
                                    href="{{ url('home?category=' . $post->category->slug) }}">
                                    {{ $post->category->name }}
                                </a>
                                <h2 class="card-title h4">{{ $post->title }}</h2>
                                {{-- <p class="card-text">{!! Str::limit($post->body, 50) !!}</p> --}}
                                <a class="btn btn-primary" href="{{ url('home/' . $post->slug) }}">
                                    Read more →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            Belum Ada Postingan
        </div>
    @endif

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
@endsection
