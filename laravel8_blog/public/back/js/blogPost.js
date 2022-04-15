// SLug
const title = document.querySelector("#inputTitle");
const slug = document.querySelector("#inputSlug");

title.addEventListener("change", function () {
    fetch("/dashboard/posts/checkSlug?title= " + title.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug));
});

class blogPost {
    summernote() {
        $('#summernote').summernote({
            placeholder: 'Enter Body',
            tabsize: 2,
            height: 300,
            popatmouse: true,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ['height', ['height']],
            ],
            callbacks: {
                onImageUpload: function(file) {
                    // for (let i = 0; i < files.length; i++) {
                    //     $.upload(files[i]);
                    // }
                    // console.log(file[0]);
                    this.uploadImage(file[0]);
                },
                onMediaDelete: function(target) {
                    $.delete(target[0].src);
                }
            },
        });
    }

    uploadImage(file) {
        console.log(file);
    }

    setup() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    previewImage() {
        const image = document.querySelector('#inputImage');
        const imagePreview = document.querySelector('.img-preview');

        imagePreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imagePreview.src = oFREvent.target.result;
        }
    }
}
