@extends('layouts.back.core.main')

@section('content')
    <div class="pt-3 pb-2 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>

    <div class="col-lg-13 my-3">
        <form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Title</label>
                <input type="text" id="inputTitle" name="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputSlug" class="form-label">Slug</label>
                <input type="text" id="inputSlug" name="slug" class="form-control @error('slug') is-invalid @enderror"
                    value="{{ old('slug', $post->slug) }}">
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                    <option value="" disabled selected>Choose Category</option>
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputImage" class="form-label">Cover</label>
                {{-- <input type="hidden" name="oldImage" value="{{ $post->image }}"> --}}
                @if ($post->image)
                    <img src="{{ asset('storage/post-images/' . $post->image) }}"
                        class="img-fluid img-preview mb-3 col-sm-5 d-block p-0">
                @else
                    <img src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg"
                        class="img-fluid img-preview mb-3 col-sm-5 d-block p-0">
                @endif

                <input type="file" id="inputImage" name="image" class="form-control @error('image') is-invalid @enderror"
                    onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputBody" class="form-label">Body</label>
                <textarea rows="5" id="summernote" name="body" class="form-control @error('body') is-invalid @enderror"
                    data-url="{{ route('imageUpload') }}"
                    data-delete="{{ route('imageDelete') }}">{!! old('body', $post->body) !!} </textarea>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
            <button type="submit" id="summernote" class="btn btn-danger">Clear Text</button>
        </form>
    </div>
@endsection

@push('styles')
    {{-- Perbaiki tampilan summernote yg acak --}}
    <style>
        .note-editor .dropdown-toggle::after {
            all: unset;
        }

        .note-editor .note-dropdown-menu {
            box-sizing: content-box;
        }

        .note-editor .note-modal-footer {
            box-sizing: content-box;
        }

    </style>
@endpush

@push('scripts')
    {{-- Slug --}}
    <script>
        const title = document.querySelector("#inputTitle");
        const slug = document.querySelector("#inputSlug");

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title= ' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>

    {{-- Start Summernote --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Enter Body',
                tabsize: 2,
                height: 300,
                popatmouse: true,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['height', ['height']],
                ],
                callbacks: {
                    // onImageUpload: function(files) {
                    //     for (let i = 0; i < files.length; i++) {
                    //         $.uploadImage(files[i]);
                    //     }

                    // },
                    onMediaDelete: function(target) {
                        $.deleteImage(target[0].src);
                    }
                },
            });

            // $.uploadImage = function(file) {
            //     $.ajaxSetup()
            //     let imageFile = new FormData();
            //     imageFile.append('image', file);
            //     let url = $('#summernote').data('url')
            //     $.ajax({
            //         method: 'POST',
            //         url: url,
            //         contentType: false,
            //         cache: false,
            //         processData: false,
            //         dataType: "JSON",
            //         data: imageFile,
            //         success: function(response) {
            //             $('#summernote').summernote('insertImage', response.imageUrl);
            //         },
            //         error: function(jqXHR, textStatus, errorThrown) {
            //             console.error(textStatus + " " + errorThrown);
            //         }
            //     });
            // };

            $.deleteImage = function(src) {
                let url = $('#summernote').data('delete')
                $.ajax({
                    method: 'POST',
                    url: url,
                    cache: false,
                    data: {
                        src: src
                    },
                    success: function(response) {
                        console.log(response);
                    }
                });
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    {{-- Preview Image --}}
    <script>
        function previewImage() {
            const image = document.querySelector('#inputImage');
            const imagePreview = document.querySelector('.img-preview');

            imagePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
