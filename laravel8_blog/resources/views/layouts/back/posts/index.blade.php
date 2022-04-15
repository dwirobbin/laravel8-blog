@extends('layouts.back.core.main')

@section('content')

    <div class="pt-3 pb-2 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <a href="{{ route('posts.create') }}" class="btn btn-primary my-3">
        <i class="fas fa-plus"></i>
        Create New Post
    </a>

    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    {{-- <th scope="col">Body</th> --}}
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <th scope="row"> {{ ($posts->currentPage() - 1) * $posts->perPage() + $loop->iteration }}
                        </th>
                        <td scope="row">{{ $post->title }}</td>
                        {{-- <td scope="row">{!! Str::limit($post->body, 50) !!}</td> --}}
                        <td scope="row">{{ $post->category->name }}</td>
                        <td scope="row">
                            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('posts.destroy', $post->slug) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td scope="row" class="text-center fw-bold" colspan="5">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
@endsection
