@extends('layouts.back.core.main')

@section('content')
    <article class="pt-3 pb-2">
        <header class="mb-3">
            <h1 class="fw-bolder mb-2">{{ $post->title }}</h1>
            <a href="{{ route('posts.index') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Back to all posts
            </a>
            <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
            <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
        </header>
        @if ($post->image)
            <figure class="mb-4" style="max-height: 400px; overflow: hidden;">
                <img class="card-img-top" src="{{ asset('storage/post-images/' . $post->image) }}" alt="" />
            </figure>
        @else
            <figure class="mb-4">
                <img class="card-img-top" src="https://dummyimage.com/850x350/ced4da/6c757d.jpg" alt="" />
            </figure>
        @endif
        <section class="mb-4">{!! $post->body !!}</section>
    </article>
@endsection
