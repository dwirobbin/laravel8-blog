@extends('layouts.front.core.main')

@section('content')
    <article>
        <header class="mb-4">
            <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
            <div class="text-muted fst-italic mb-2">
                Posted on {{ date('d M Y', strtotime($post->created_at)) }} By
                <a href="{{ url('home?author=' . $post->author->username) }}"
                    class="text-decoration-none">{{ $post->author->name }}
                </a>
            </div>
            <a class="badge bg-secondary text-decoration-none link-light"
                href="{{ url('home?category=' . $post->category->slug) }}">
                {{ $post->category->name }}
            </a>
        </header>
        @if ($post->image)
            <figure class="mb-4" style="max-height: 500px; overflow: hidden;">
                <img class="card-img-top" src="{{ asset('storage/post-images/' . $post->image) }}" alt="" />
            </figure>
        @else
            <figure class="mb-4">
                <img class="card-img-top" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="" />
            </figure>
        @endif
        <section class="mb-5">{!! $post->body !!}</section>
    </article>
@endsection
